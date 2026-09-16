let videos = [
    { titre: "HTML", duree: 3, views: 2500 },
    { titre: "CSS", duree: 5, views: 3000 },
    { titre: "JavaScript", duree: 4, views: 1800 },
    { titre: "PHP", duree: 2, views: 2200 },
    { titre: "MySQL", duree: 6, views: 4000 }
];

// 1. Garder les vidéos populaires
let populaires = [];

for (let i = 0; i < videos.length; i++) {
    if (videos[i].views >= 2000) {
        populaires.push(videos[i]);
    }
}

// 2. Trier par durée croissante
for (let i = 0; i < populaires.length - 1; i++) {
    for (let j = i + 1; j < populaires.length; j++) {
        if (populaires[i].duree > populaires[j].duree) {
            let temp = populaires[i];
            populaires[i] = populaires[j];
            populaires[j] = temp;
        }
    }
}

// 3. Choisir les vidéos sans dépasser 10 minutes
let videosChoisies = [];
let dureeTotale = 0;

for (let i = 0; i < populaires.length; i++) {
    if (dureeTotale + populaires[i].duree <= 10) {
        videosChoisies.push(populaires[i]);
        dureeTotale += populaires[i].duree;
    }
}

// 4. Affichage
console.log("Vidéos choisies :");

for (let i = 0; i < videosChoisies.length; i++) {
    console.log(videosChoisies[i].titre);
}

console.log("Nombre de vidéos :", videosChoisies.length);
console.log("Durée totale :", dureeTotale, "minutes");