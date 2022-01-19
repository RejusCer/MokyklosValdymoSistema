let inputs = document.querySelectorAll(".form-control")
let toggler = document.querySelectorAll("#toggler")
let submitButton = document.querySelector("#updateButton")

for (let i = 0; i < toggler.length; i++)
{
    // pridėti mygtuką kuris reguliuotu inputo disabled reikšmę
    toggler[i].addEventListener("click", function(){
        // if == 0 yra, kad būtu paspaustas ir vardas
        if (i == 0)
        {
            inputs[i].disabled == true ? inputs[i].disabled = false : inputs[i].disabled = true
        }
        inputs[i + 1].disabled == true ? inputs[i + 1].disabled = false : inputs[i + 1].disabled = true
    })
}

// kai paspaudžiamas mygtukas 'atnaujinti' disabled yra panaikinamas
submitButton.addEventListener('click', function(){
    for (let i = 0; i < inputs.length; i++)
    {
        inputs[i].disabled = false
    }
})