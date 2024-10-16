let addRow = document.getElementById("add-row");
addRow.addEventListener('click',function(){
    let table = document.getElementById('table').getElementsByTagName("tbody")[0];
    let newRow = table.insertRow(table.rows.length);

    let namaBukuCell = newRow.insertCell(0);
    let aksiCell = newRow.insertCell(1);

    namaBukuCell.innerHTML = "Tess";
    aksiCell.innerHTML = "<button type='button' onClick='deleteRow(this)' class='btn btn-sm btn-danger'>Hapus</button>";

    // untuk mengambil Test
    let bukuName = document.getElementById("id_buku");
    bukuName = bukuName.option[bukuName.selectedIndex].text;

});

// getElementsByTagName = untuk mengambil tag element 

function deleteRow(button){
    let row = button.parentNode.parentNode;
    row.parentNode.removeChild(row);
}