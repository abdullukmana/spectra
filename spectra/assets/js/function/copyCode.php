<script>
    const copyCode = (button, targetElement) => {
        const tempTextarea = document.createElement('textarea');
        const initialContent = button.innerHTML;

        tempTextarea.value = targetElement.innerText;
        document.body.appendChild(tempTextarea);
        tempTextarea.select();
        document.execCommand('copy');
        document.body.removeChild(tempTextarea);

        button.innerHTML =  `<i class="bi bi-check2 me-1"></i>Copied!`;
        button.disabled = true;
        setTimeout(() => {
            button.innerHTML = initialContent;
            button.disabled = false;
        }, 2000);
    }
</script>