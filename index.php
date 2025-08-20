<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyFavBreweries</title>
</head>
<body>
    <?php require_once __DIR__ . "/public/header.php"; ?>

    <main>
        <fieldset class="filter-fieldset">
            <legend>Filtrer par pays</legend>
              
                <div class="radio-button">
                    <input type="checkbox" name="country" id="france" value="France"/>
                        <label for="france">France</label>
                </div>
                <div class="radio-button">
                    <input type="checkbox" name="country" id="south_korea" value="South Korea"/>
                        <label for="south_korea">Coree du Sud</label>
                </div>
                <div class="radio-button">
                    <input type="checkbox" name="country" id="england" value="England"/>
                        <label for="england">Angleterre</label>
                </div>
                <div class="radio-button">
                    <input type="checkbox" name="country" id="united_states" value="United States"/>
                        <label for="united_states">Etats-Unis</label>
                </div>
                <button type="button" onclick="selectCountry()">Selectionner</button>
                <div id="result-country"></div>
        </fieldset>    
        
        
        <fieldset class="filter-fieldset">
            <legend>Filtrer par type</legend>
                <div class="radio-button">
                    <input type="checkbox" name="type"id="micro" value="Micro"/>
                        <label for="micro">Micro</label>
                </div>
                <div class="radio-button">
                    <input type="checkbox" name="type" id="brewpub" value="Brewpub"/>
                        <label for="brewpub">Brewpub</label>
                </div>
                <div class="radio-button">
                    <input type="checkbox" name="type" id="large" value="Large"/>
                        <label for="large">Large</label>
                </div>
                <button type="button" onclick="selectType()">Selectionner</button>
                <div id="result-type"></div>
        </fieldset>
        
    </main>
    <script src="/script.js"></script>
</body>
</html>