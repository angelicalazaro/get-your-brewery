function selectCountry() {
    const checkedCountries = document.querySelectorAll('input[name="country"]:checked');
    const countries = Array.from(checkedCountries).map(input => input.value);
        if (countries.length > 0) {
            document.getElementById("result-country").innerHTML = "Pays selectionnes : " + countries.join(', '); 
        } else {
            document.getElementById("result-country").innerHTML = "Aucun pays selectionne";
        }
    updateBreweries();
}

function selectType() {
    const checkedTypes = document.querySelectorAll('input[name="type"]:checked');
    const types = Array.from(checkedTypes).map(input => input.value);
        if (types.length > 0) {
            document.getElementById("result-type").innerHTML = "Type(s) selectionne(s) : " + types.join(', ');
        } else {
            document.getElementById("result-type").innerHTML = "Aucun type selectionne";
        }
    updateBreweries();
}

function updateBreweries() {
    const checkedCountries = document.querySelectorAll('input[name="country"]:checked');
    const countries = Array.from(checkedCountries).map(input => input.value);
    const checkedTypes = document.querySelectorAll('input[name="type"]:checked');
    const types = Array.from(checkedTypes).map(input => input.value);
    loadBreweries(countries, types);
}