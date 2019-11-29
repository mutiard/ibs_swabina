function dynamicSelect2(idSelectedBox, ajaxUrl, idSelectKecamatan) {
    let idSelectToBeReplaced;
    idSelectedBox.on('select2:select', function (e) {
        let data = e.params.data;
        console.log(data);
        if (data.id !== '') {
            let newUrl = ajaxUrl+'/'+data.id;
            $.ajax({
                url: newUrl,
                success: function (result) {
                    console.log(newUrl);
                    if (idSelectKecamatan !== null) {
                        idSelectKecamatan.children('option:not(:first)').remove();
                        idSelectToBeReplaced = idSelectKecamatan;
                    } 
                    $.each(result, function (index, element) {
                        var valId = null;
                        if (idSelectToBeReplaced === idSelectKecamatan) {
                            valId = element.id;
                        }

                        let newSelectToBeRepalced = new Option(element.name, valId, false, false);
                        idSelectToBeReplaced.append(newSelectToBeRepalced);
                    });
                    idSelectToBeReplaced.trigger('change');
                }
            })
        }
    })
}