$(function() {
  $("#sortable1, #sortable2")
    .sortable({
      connectWith: ".connectedSortable"
    })
    .disableSelection();
});

function submit() {
  var idsInOrder = $("#sortable2").sortable("toArray", { attribute: "id" });
  alert(idsInOrder);
}
