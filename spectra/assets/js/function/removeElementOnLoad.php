<script>
function removeElementOnLoad(selector) {
    document.addEventListener('DOMContentLoaded', function() {
        const element = document.querySelector(selector);
        if (element) {
            element.remove();
        } else {
            console.error(`Element with selector '${selector}' not found`);
        }
    });
}
</script>