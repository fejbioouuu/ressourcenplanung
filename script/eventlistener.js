function absenceTypeClickHandler() {
    // Here, `this` refers to the element the event was hooked on
    let typeId = this.getElementsByClassName('absenceTypeId')[0].innerHTML;
    let typeName = this.getElementsByClassName('absenceTypeName')[0].innerHTML;
    let typeType = this.getElementsByClassName('absenceTypeType')[0].innerHTML;




    console.log(typeId);
    console.log(typeName);
    console.log(typeType);
    document.getElementById('absenceTypeUpdateId').value = typeId;
    document.getElementById('absenceTypeUpdateName').value = typeName;
    document.getElementById('absenceTypeUpdateType').value = typeType;


    console.log(this);
}

let allTypeTr = document.querySelectorAll('#absenceTypeTable tr');
console.log(allTypeTr);

allTypeTr.forEach(function (element) {
if (element.classList.contains('absenceTypeContent')) {
    element.addEventListener("click", absenceTypeClickHandler);
}
});




function absencesClickHandler() {
    let absencesId = this.getElementsByClassName('absencesId')[0].innerHTML;
    let absencesTypeName = this.getElementsByClassName('absencesTypeName')[0].dataset.typeid;

    let absencesStartDate = this.getElementsByClassName('absencesStartDate')[0].innerHTML; //bisher falsches format ---! hier weitermachen


    console.log(absencesId);
    console.log(absencesTypeName);
    console.log(absencesStartDate);
    document.getElementById('absencesUpdateId').value = absencesId;
    document.getElementById('absencesUpdateTypeName').value = absencesTypeName;
    document.getElementById('absencesUpdateStartDate').value = absencesStartDate;

    console.log(this);
}

let allAbsencesTr = document.querySelectorAll('#absencesTable tr');
console.log(allAbsencesTr);

allAbsencesTr.forEach(function (element) {
    if(element.classList.contains('absencesContent')){
        element.addEventListener("click", absencesClickHandler);
    }

});
