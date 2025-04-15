document.querySelector('input[type="time"]').addEventListener('input', (e) => {
    const timeValue = e.target.value;
    if (timeValue) {
        e.target.style.borderColor = "green"; 
    } else {
        e.target.style.borderColor = "red"; 
    }
});