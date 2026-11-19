<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class PengurusController extends Controller
{
    public function index(): View
    {
        $pengurus = User::query()
            ->where('role', 'pengurus')
            ->latest()
            ->paginate(12);

        return view('owner.pengurus.index', compact('pengurus'));
    }

    public function create(): View
    {
        return view('owner.pengurus.form', [
            'pengurus' => new User,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $validated['password'],
            'role' => 'pengurus',
        ]);

        return redirect()
            ->route('owner.pengurus.index')
            ->with('success', 'Akun pengurus berhasil dibuat.');
    }

    public function edit(User $pengurus): View
    {
        abort_unless($pengurus->isPengurus(), 404);

        return view('owner.pengurus.form', compact('pengurus'));
    }

    public function update(Request $request, User $pengurus): RedirectResponse
    {
        abort_unless($pengurus->isPengurus(), 404);

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($pengurus),
            ],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ]);

        $attributes = [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'role' => 'pengurus',
        ];

        if (! empty($validated['password'])) {
            $attributes['password'] = $validated['password'];
        }

        $pengurus->update($attributes);

        return redirect()
            ->route('owner.pengurus.index')
            ->with('success', 'Akun pengurus berhasil diperbarui.');
    }

    public function destroy(User $pengurus): RedirectResponse
    {
        abort_unless($pengurus->isPengurus(), 404);

        $pengurus->delete();

        return redirect()
            ->route('owner.pengurus.index')
            ->with('success', 'Akun pengurus berhasil dihapus.');
    }
}
