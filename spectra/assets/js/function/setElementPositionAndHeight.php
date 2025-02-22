<script>
function setElementPositionAndHeight({ selectorOrElement, height, top }) {
    let elements;
    if (typeof selectorOrElement === 'string') {
        elements = document.querySelectorAll(selectorOrElement);
    } else if (selectorOrElement instanceof HTMLElement) {
        elements = [selectorOrElement];
    } else {
        throw new Error('Property "selectorOrElement" harus berupa string atau elemen HTML.');
    }

    elements.forEach(element => {
        element.style.setProperty('--element-height', `${height}px`);
        element.style.setProperty('--element-top', `${top}px`);
    });
}
</script>