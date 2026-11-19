document.addEventListener('click', (event) => {
    if (!(event.target instanceof Element)) {
        return;
    }

    const addButton = event.target.closest('[data-repeater-add]');

    if (addButton) {
        const repeater = addButton.closest('[data-repeater]');
        const template = repeater.querySelector('[data-repeater-template]');
        const items = repeater.querySelector('[data-repeater-items]');
        const index = Number(repeater.dataset.nextIndex);
        const fragment = template.content.cloneNode(true);

        fragment.querySelectorAll('[id], [for], [name]').forEach((element) => {
            ['id', 'for', 'name'].forEach((attribute) => {
                const value = element.getAttribute(attribute);

                if (value) {
                    element.setAttribute(attribute, value.replace(/__INDEX__/g, String(index)));
                }
            });
        });

        items.append(fragment);
        repeater.dataset.nextIndex = String(index + 1);
        updateLabels(repeater);
    }

    const removeButton = event.target.closest('[data-repeater-remove]');

    if (removeButton) {
        const repeater = removeButton.closest('[data-repeater]');

        removeButton.closest('.owner-repeater-item').remove();
        updateLabels(repeater);
    }
});

function updateLabels(repeater) {
    repeater.querySelectorAll('[data-repeater-items] .owner-repeater-item h3').forEach((heading, index) => {
        heading.textContent = `${repeater.dataset.label} ${index + 1}`;
    });
}
