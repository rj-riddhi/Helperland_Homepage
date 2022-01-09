function exportToExcel(tableID, filename = ''){
    var downloadurl;
    var dataFileType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById('myTable');
    var tableHTMLData = tableSelect.outerHTML.replace(/ /g, '%20');
    
    filename = filename?filename+'.xls':'export_excel_data.xls';
    
    downloadurl = document.createElement("a");
    
    document.body.appendChild(downloadurl);
    
    if(navigator.msSaveOrOpenBlob){
        var blob = new Blob(['\ufeff', tableHTMLData], {
            type: dataFileType
        });
        navigator.msSaveOrOpenBlob( blob, filename);
    }else{
        downloadurl.href = 'data:' + dataFileType + ', ' + tableHTMLData;
    
        downloadurl.download = filename;
        
        downloadurl.click();
    }
}


function records(){
    console.log("clicked");
}

$(document).ready(function(){
    $('#MybtnModal').click(function(){
        $('#Mymodal').modal('show')
    });
});


 
