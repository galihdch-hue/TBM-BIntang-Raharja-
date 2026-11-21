document.querySelectorAll('[data-responsive-nav-toggle]').forEach((toggle) => {
    const navigationId = toggle.getAttribute('aria-controls');
    const navigation = document.getElementById(navigationId);

    if (!navigation) {
        throw new Error(`Navigation element "${navigationId}" was not found.`);
    }

    const setExpanded = (isExpanded) => {
        toggle.setAttribute('aria-expanded', String(isExpanded));
        navigation.classList.toggle('is-open', isExpanded);
    };

    toggle.addEventListener('click', () => {
        setExpanded(toggle.getAttribute('aria-expanded') !== 'true');
    });

    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape' && toggle.getAttribute('aria-expanded') === 'true') {
            setExpanded(false);
            toggle.focus();
        }
    });

    navigation.addEventListener('click', (event) => {
        if (event.target instanceof Element && event.target.closest('a')) {
            setExpanded(false);
        }
    });
});
