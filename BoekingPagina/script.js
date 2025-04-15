    document.querySelectorAll('input[type="date"], input[type="time"]').forEach((input) => {
        input.addEventListener('focus', (e) => {
            e.target.style.backgroundColor = "#eaeaff"; 
            e.target.style.boxShadow = "0 0 10px rgba(0, 123, 255, 0.8)"; 
            e.target.style.transition = "all 0.3s ease";
        });

        input.addEventListener('blur', (e) => {
            e.target.style.backgroundColor = ""; 
            e.target.style.boxShadow = ""; 
        });
    });
    document.querySelector('input[type="date"]').addEventListener('change', (e) => {
        const selectedDate = new Date(e.target.value);
        const today = new Date();
        
        if (selectedDate >= today) {
            e.target.style.borderColor = "green"; 
        } else {
            e.target.style.borderColor = "red";
        }
    });

    document.querySelector('input[type="time"]').addEventListener('input', (e) => {
        const timeValue = e.target.value;
        if (timeValue) {
            e.target.style.borderColor = "green"; 
        } else {
            e.target.style.borderColor = "red"; 
        }
    });
    document.querySelectorAll('input[type="date"], input[type="time"]').forEach((input) => {
        input.addEventListener('focus', (e) => {
            e.target.style.transform = "scale(1.05)"; 
            e.target.style.transition = "transform 0.3s ease";
        });

        input.addEventListener('blur', (e) => {
            e.target.style.transform = "scale(1)"; 
        });
    });
    document.querySelectorAll('input[type="date"], input[type="time"]').forEach((input) => {
        const originalPlaceholder = input.getAttribute('placeholder') || "";

        input.addEventListener('mouseover', (e) => {
            if (e.target.type === "date") {
                e.target.setAttribute('placeholder', "Kies een datum");
            } else if (e.target.type === "time") {
                e.target.setAttribute('placeholder', "Kies een tijd");
            }
        });

        input.addEventListener('mouseout', (e) => {
            e.target.setAttribute('placeholder', originalPlaceholder);
        });
    });
    document.querySelector('input[type="date"]').addEventListener('focus', (e) => {
        const tooltip = document.createElement('div');
        tooltip.textContent = "Kies een datum vanaf vandaag.";
        tooltip.style.position = "absolute";
        tooltip.style.backgroundColor = "#000";
        tooltip.style.color = "#fff";
        tooltip.style.padding = "5px 10px";
        tooltip.style.borderRadius = "5px";
        tooltip.style.fontSize = "12px";
        tooltip.style.top = `${e.target.offsetTop - 30}px`;
        tooltip.style.left = `${e.target.offsetLeft}px`;
        tooltip.classList.add('tooltip');
        document.body.appendChild(tooltip);

        e.target.addEventListener('blur', () => {
            document.querySelector('.tooltip')?.remove();
        });
    });
