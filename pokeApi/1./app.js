// Beispiel-Daten (Dummy)
// const pokemons = [
//     {
//         name: "Pikachu",
//         type: "Elektro",
//         image: "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/25.png",
//         abilities: ["Donnerschock", "Ruckzuckhieb", "Eisenschweif", "Donner"]
//     },
//     {
//         name: "Glumanda",
//         type: "Feuer",
//         image: "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/4.png",
//         abilities: ["Kratzer", "Glut", "Feuerwirbel", "Flammenwurf"]
//     },
//     {
//         name: "Schiggy",
//         type: "Wasser",
//         image: "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/7.png",
//         abilities: ["Aquaknarre", "Tackle", "Panzerhieb", "Hydropumpe"]
//     }
// ];





fetch("https://pokeapi.co/api/v2/pokemon?limit=3") // nur 3 Pokémon für den Anfang
    .then(res => res.json())
    .then(data => {
        console.log(data.results);

        // Erstelle ein Array mit Details (Dummy-Infos für Attacken und Typ erstmal leer)
        const pokemons = data.results.map(p => ({
            name: p.name,
            image: `https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/${getIdFromUrl(p.url)}.png`,
            type: "?", // Typ holen wir später, aktuell nur Platzhalter
            abilities: ["?"]
        }));

        // Jetzt anzeigen
        showCards(pokemons);
    });

// Helferfunktion: ID aus der URL holen
function getIdFromUrl(url) {
    const parts = url.split("/").filter(part => part);
    return parts[parts.length - 1];
}

// showCards anpassen
function showCards(pokemons) {
    const container = document.getElementById('card-container');
    container.innerHTML = "";

    pokemons.forEach(pokemon => {
        const card = document.createElement('div');
        card.className = 'card';

        card.innerHTML = `
            <img src="${pokemon.image}" alt="${pokemon.name}">
            <h2>${pokemon.name}</h2>
            <p class="type">${pokemon.type}</p>
            <ul class="abilities">
                ${pokemon.abilities.slice(0, 3).map(ability => `<li>${ability}</li>`).join("")}
            </ul>
        `;

        container.appendChild(card);
    });
}