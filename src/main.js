let id = $("input[name*='IDProdus']")
id.attr("readonly","readonly");


$(".btnedit").click( e =>{
    let textvalues = displayData(e);

    ;
    let numeprodus = $("input[name*='nume_produs']");
    let pretprodus = $("input[name*='pret_produs']");
    let cantitate = $("input[name*='cantitate']");
    let descriere = $("input[name*='descriere']");
    let comentarii = $("input[name*='comentarii']");
    let rating = $("input[name*='rating']");

    id.val(textvalues[0]);
    numeprodus.val(textvalues[1]);
    pretprodus.val(textvalues[2]);
    cantitate.val(textvalues[3]);
    descriere.val(textvalues[4]);
    rating.val(textvalues[5]);
    rating.val(textvalues[6].replace("$",""));
});


function displayData(e) {
    let id = 0;
    const td = $("#tbody tr td");
    let textvalues = [];

    for (const value of td){
        if(value.dataset.id == e.target.dataset.id){
           textvalues[id++] = value.textContent;
        }
    }
    return textvalues;

}