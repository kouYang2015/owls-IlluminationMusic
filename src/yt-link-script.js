function addRowHandlers() {
  var table = document.getElementById("playlistTable");
  var rows = table.getElementsByTagName("tr");
  for (i = 0; i < rows.length; i++) {
    var currentRow = table.rows[i];
    var createClickHandler = function (row) {
      return function () {
        var cell = row.getElementsByTagName("td")[0];
        var cell2 = row.getElementsByTagName("td")[1];
        var cell3 = row.getElementsByTagName("td")[2];
        var id = cell.innerHTML + " " + cell2.innerHTML + " " + cell3.innerHTML;
        window.open(
          "https://www.youtube.com/results?search_query=" + id,
          "_blank"
        );
      };
    };

    currentRow.onclick = createClickHandler(currentRow);
  }
}
window.onload = addRowHandlers();
