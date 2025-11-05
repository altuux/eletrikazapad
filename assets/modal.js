const modal = document.getElementById("serviceModal");
const openBtn = document.getElementById("openModal");
const closeBtn = document.querySelector(".close");
const submitBtn = document.getElementById("submitAll");
const mainForm = document.getElementById("mainForm");

// Funkce pro ověření hlavního formuláře
function validateMainForm() {
    const name = document.getElementById("name").value.trim();
    const email = document.getElementById("email").value.trim();
    const phone = document.getElementById("phone").value.trim();
    const accept = document.getElementById("accept").checked;

    // Základní kontrola povinných polí
    if (!name || !email || !accept) {
        alert("Prosím, vyplňte všechna povinná pole a souhlas s osobními údaji.");
        return false;
    }

    // Validace e-mailu
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        alert("Prosím, zadejte platný e-mail.");
        return false;
    }

    // Validace telefonu (volitelné, pokud není prázdné)
    if (phone) {
        // Příklad českého formátu: 9 číslic, volitelně s mezerami, pomlčkami nebo +420
        const phoneRegex = /^(\+420\s?)?[1-9][0-9]{2}(\s?[0-9]{3}){2}$/;
        if (!phoneRegex.test(phone)) {
            alert("Prosím, zadejte platné české telefonní číslo.");
            return false;
        }
    }

    return true; // všechno OK
}

// Otevření modalu po validaci
openBtn.onclick = () => {
    if (validateMainForm()) {
        modal.style.display = "block";
    }
}

// Zavření modalu
closeBtn.onclick = () => modal.style.display = "none";
window.onclick = (e) => { 
    if(e.target == modal) modal.style.display = "none"; 
}

window.addEventListener("keydown", (e) => {
    if(e.key === "Escape") {
        modal.style.display = "none";
    }
});


// Odeslání formuláře s doplněním údajů z modalu
submitBtn.onclick = () => {
    const service = document.getElementById("service").value;
    const note = document.getElementById("note").value;

    if (!service) {
        alert("Prosím, vyberte službu.");
        return;
    }

    // Vytvoření hidden inputů pro odeslání
    let inputService = document.createElement("input");
    inputService.type = "hidden";
    inputService.name = "service";
    inputService.value = service;
    mainForm.appendChild(inputService);

    let inputNote = document.createElement("input");
    inputNote.type = "hidden";
    inputNote.name = "note";
    inputNote.value = note;
    mainForm.appendChild(inputNote);

    // Odeslání hlavního formuláře
    mainForm.action = "https://api.web3forms.com/submit"; // tvůj endpoint
    mainForm.method = "post";
    mainForm.submit();
}
