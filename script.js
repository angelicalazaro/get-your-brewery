function selectCountry() {
    
    const checkedCountries = document.querySelectorAll('input[name="country"]:checked');
    const countries = Array.from(checkedCountries).map(input => input.value);

}

function selectType() {
    
    const checkedTypes = document.querySelectorAll('input[name="type"]:checked');
    const types = Array.from(checkedTypes).map(input => input.value);

}