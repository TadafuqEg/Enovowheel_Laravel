let customInput = document.querySelector('.customInput')
selectedData = document.querySelector('.selectedData')
searchInput = document.querySelector('.searchInput input')
ul = document.querySelector('.options ul')
customInputContainer = document.querySelector('.customInputContainer')

window.addEventListener('click', (e) => {
    if (document.querySelector('.searchInput').contains(e.target)) {
        document.querySelector('.searchInput').classList.add('focus')
    } else {
        document.querySelector('.searchInput').classList.remove('focus')
    }
})

var countries = [
    "Custom Input",
    "Afghanistan",
    "Aland Islands",
    "Albania",
    "Algeria",
    "American Samoa",
    "Andorra",
    "Angola",
    "Anguilla",
    "Antarctica",

];

customInput.addEventListener('click', () => {
    customInputContainer.classList.toggle('show')
})

let countriesLength = countries.length

for (let i = 0; i < countriesLength; i++) {
    let country = countries[i]
    const li = document.createElement("li");
    const countryName = document.createTextNode(country);
    li.appendChild(countryName);
    ul.appendChild(li);
}


ul.querySelectorAll('li').forEach(li => {
    li.addEventListener('click', (e) => {
        let selectdItem = e.target.innerText
        selectedData.innerText = selectdItem
        
        for (const li of document.querySelectorAll("li.selected")) {
            li.classList.remove("selected");
        }
        e.target.classList.add('selected')
        customInputContainer.classList.toggle('show')
    })
});

function updateData(data) {
    let selectedCountry = data.innerText
    selectedData.innerText = selectedCountry

    for (const li of document.querySelectorAll("li.selected")) {
        li.classList.remove("selected");
    }
    data.classList.add('selected')
    customInputContainer.classList.toggle('show')
    console.log(selectedCountry);
}

searchInput.addEventListener('keyup', (e) => {
    let searchedVal = searchInput.value.toLowerCase()
    let searched_country = []

    searched_country = countries.filter(data => {
        return data.toLocaleLowerCase().startsWith(searchedVal)
    }).map(data => {
        return `<li onClick="updateData(this)">${data}</li>`
    }).join('')
    ul.innerHTML = searched_country ? searched_country : "<p style='margin-top: 1rem;'>Opps can't find any result <p style='margin-top: .2rem; font-size: .9rem;'>Try searching something else.</p></p>"
})