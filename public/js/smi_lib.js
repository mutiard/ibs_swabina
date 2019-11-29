$(document).ready(function(){
//document onload start
//----------------on show modal
$(".pendidikanformal-modal").on('shown.bs.modal', function (e) {
    let tabledata = $(e.relatedTarget).parents('tr').find('th');
    $(this).data("tr",tabledata);

    $("#pendidikanformal #TingkatPendidikan").val($(e.relatedTarget).data("id")|| "");
    $("#pendidikanformal #TingkatPendidikan").val(tabledata.eq(0).data('value')|| "");
    $("#pendidikanformal #tahunmulai").val(tabledata.eq(1).data('tanggalmulai')|| "");
    $("#pendidikanformal #tahunakhir").val(tabledata.eq(1).data('tanggalakhir')|| "");
    $("#pendidikanformal #institusi").val(tabledata.eq(2).text()|| "");
    $("#pendidikanformal #tempat").val(tabledata.eq(3).text()|| "");
    $("#pendidikanformal #jurusan").val(tabledata.eq(4).text()|| "");
    $("#pendidikanformal #IPK").val(tabledata.eq(5).text()|| "");
    $("#pendidikanformal #keterangan").val(tabledata.eq(6).text()|| "");
});

$(".pendidikaninformal-modal").on('shown.bs.modal', function (e) {
    let tabledata = $(e.relatedTarget).parents('tr').find('th');
    $(this).data("tr",tabledata);
    
    $("#pendidikaninformal #id").val($(e.relatedTarget).data("id")|| "");
    $("#pendidikaninformal #jenispelatihan").val(tabledata.eq(0).data('value')||"");
    $("#pendidikaninformal #tahunmulai").val(tabledata.eq(1).data('tanggalmulai')|| "");
    $("#pendidikaninformal #tahunakhir").val(tabledata.eq(1).data('tanggalakhir')|| "");
    $("#pendidikaninformal #tempat").val(tabledata.eq(2).text()|| "");
    $("#pendidikanformal #keterangan").val(tabledata.eq(3).text()|| "");
});

$(".pendidikanbahasa-modal").on('shown.bs.modal', function (e) {
    let tabledata = $(e.relatedTarget).parents('tr').find('th');
    $(this).data("tr",tabledata);
    
    $("#pendidikanbahasa #id").val($(e.relatedTarget).data("id")|| "");
    $("#pendidikanbahasa #bahasa").val(tabledata.eq(0).data('value')||"");
    $("#pendidikanbahasa #kemampuanlisan").val(tabledata.eq(1).data('value')||"");
    $("#pendidikanbahasa #kemampuantertutlis").val(tabledata.eq(2).data('value')||"");
});
$(".aktivitas-modal").on('shown.bs.modal', function (e) {
    let tabledata = $(e.relatedTarget).parents('tr').find('th');
    $(this).data("tr",tabledata);
    
    $("#aktivitas #id").val($(e.relatedTarget).data("id") || "");
    $("#aktivitas #Organisasi").val(tabledata.eq(0).text() || "");
    $("#aktivitas #TahunMulai").val(tabledata.eq(1).data('tanggalmulai') || "");
    $("#aktivitas #TahunAkhir").val(tabledata.eq(1).data('tanggalakhir') || "");
    $("#aktivitas #Tempat").val(tabledata.eq(2).text() || "");
    $("#aktivitas #Posisi").val(tabledata.eq(3).text() || "");
    $("#aktivitas #Keterangan").val(tabledata.eq(4).text() || "");
});
$(".minat-modal").on('shown.bs.modal', function (e) {
    let tabledata = $(e.relatedTarget).parents('tr').find('th');
    $(this).data("tr",tabledata);
    
    $("#minat #id").val($(e.relatedTarget).data("id") || "");
    $("#minat #BidangBisnis").val(tabledata.eq(0).data('value') || '' );
    $('#minat #LingkunganKerja').val(tabledata.eq(1).data('value') || '');
    $('#minat #Spesialisasi').val(tabledata.eq(2).data('value') || '');
    $('#minat #PosisiKerja').val(tabledata.eq(3).data('value') || '');
    $('#minat #LevelJabatan').val(tabledata.eq(4).data('value')|| '' );
    $("#minat #_GajiBulan").val(formatRp(tabledata.eq(5).text())|| '');
    $("#minat #GajiBulan").val(parseInt(getAngka(tabledata.eq(5).text())) || '');
});
$(".riwayatpenyakit-modal").on('shown.bs.modal', function (e) {
    let tabledata = $(e.relatedTarget).parents('tr').find('th');
    $(this).data("tr",tabledata);
    
    $("#lainnya #id").val($(e.relatedTarget).data("id")|| "");
    $("#lainnya #NamaPenyakit").val(tabledata.eq(0).text()||"");
    $("#lainnya #TahunMulai").val(tabledata.eq(1).data('tanggalmulai')||"");
    $("#lainnya #TahunAkhir").val(tabledata.eq(1).data('tanggalakhir')||"");
    $("#lainnya #Pengaruh").val(tabledata.eq(2).text()||"");
});

$('.pengalamankerja-modal').on('shown.bs.modal', function (e) {
    let tabledata = $(e.relatedTarget).parents('tr').find('th');
    $(this).data("tr",tabledata);
    
    $("#pekerjaan #id").val($(e.relatedTarget).data("id")|| "");
    $("#pekerjaan #NamaPerusahaan").val(tabledata.eq(0).text() || "");
    $("#pekerjaan #BisnisPerusahaan").val(tabledata.eq(1).data('value') || "");
    $("#pekerjaan #TahunMulai").val(tabledata.eq(2).data('tanggalmulai')|| "");
    $("#pekerjaan #TahunAkhir").val(tabledata.eq(2).data('tanggalakhir')|| "");
    $("#pekerjaan #TempatKerja").val(tabledata.eq(3).text() || "");
    $("#pekerjaan #Posisi").val(tabledata.eq(4).text()|| "");
    $('#pekerjaan #Bawahan').val(tabledata.eq(5).text()|| "");
    $('#pekerjaan #_GajiTerakhir').val(formatRp(tabledata.eq(6).text())|| "");
    $('#pekerjaan #GajiTerakhir').val(parseInt(getAngka(tabledata.eq(6).text()))|| "");
    $('#pekerjaan #AlasanPindah').val(tabledata.eq(7).text()|| "");
    $('#pekerjaan #Keterangan').val(tabledata.eq(8).text()|| "");
});

$('#deletemodal').on('shown.bs.modal', function (e) {
    $(this).data("id",$(e.relatedTarget).data("id"));
    $(this).data("href",$(e.relatedTarget).data("href"));
    $(this).data("tr",$(e.relatedTarget).parents('tr'));
});

$('#deletemodal_lampiran').on('shown.bs.modal', function (e) {
    let form = $(e.relatedTarget).parents('form');
    let sendid = form.attr("id");
    $(this).data("id",sendid);
    $(this).data("form",form);
});

//----------------on hide modal
$(".pendidikanformal-modal").on('hide.bs.modal', function (e) {
    $(this).find("#id").val('');
});
$(".pendidikaninformal-modal").on('hide.bs.modal', function (e) {
    $(this).find("#id").val('');
});
$(".pendidikanbahasa-modal").on('hide.bs.modal', function (e) {
    $(this).find("#id").val('');
});
$(".aktivitas-modal").on('hide.bs.modal', function (e) {
    $(this).find("#id").val('');
});
$(".minat-modal").on('hide.bs.modal', function (e) {
    $(this).find("#id").val('');
});
$(".riwayatpenyakit-modal").on('hide.bs.modal', function (e) {
    $(this).find("#id").val('');
});
$('.pengalamankerja-modal').on('hide.bs.modal', function (e) {
    $(this).find("#id").val('');
});

$('#deletemodal').on("hidden.bs.modal",function(e){
    e.preventDefault();
    $("#delete-caution").parent("div").hide();
});

$('#deletemodal_lampiran').on("hidden.bs.modal",function(e){
    e.preventDefault();
    $("#delete-caution").parent("div").hide();
});



$('#delete_supreme').click(function(e){
    e.preventDefault();
    let sendProsses = $(this);
    if($(this).data('run'))return;
    sendProsses.data('run',true);

    let href = $("#deletemodal").data("href");
    let dataId = $("#deletemodal").data("id");
    let tr_delete = $("#deletemodal").data('tr');
    console.log(href,dataId,tr_delete);

    $.ajaxSetup({
        headers:{
        'X-CSRF-TOKEN':$('meta[name="_token"]').attr('content')
        } });
    $.ajax({
        url:href,
        method:"delete",
        data :{
            id: dataId,
        },
        success:function(result){
            console.log(result.success);
            if(result.success){
                tr_delete.remove();
                $("#deletemodal").modal("hide");
                let selector = `[id^=${result.statussection}],[class^=${result.statussection}]`;
                if(result.statusform)
                    $(selector).hide();
                else
                    $(selector).show();
                    
            }else{
                $("#delete-caution").parent("div").show();
            }
        },
        fail:function(){
            $("#delete-caution").parent("div").show();
        },
        beforeSend: function(){

            $("#delete_supreme a").text('Hapus...');
            $("#delete_supreme #loader").show();
        },
        complete:function(data){
            
            sendProsses.data('run',false);
            $("#delete_supreme a").text('Hapus');
            $("#delete_supreme #loader").hide();
        }
    });
});

$('#delete_lampiran').click(function(e){
    e.preventDefault();
    let sendProsses = $(this);
    if($(this).data('run'))return;
    sendProsses.data('run',true);

    let dataId = $("#deletemodal_lampiran").data("id");
    let formLampiran =  $("#deletemodal_lampiran").data("form");
    $.ajaxSetup({
        headers:{
        'X-CSRF-TOKEN':$('meta[name="_token"]').attr('content')
        } });
    $.ajax({
        url:"/jobseeker/datadiri/deletelampiran/",
        method:"delete",
        data :{
            id: dataId,
        },
        success:function(result){
            console.log(result.success);
            if(result.success){
                let sectLampiran = formLampiran.children();
                sectLampiran.eq(0).slideDown(); //form upload
                sectLampiran.eq(1).slideUp(); //block-action 
                sectLampiran.eq(1).removeClass("isUploaded");
                $("#deletemodal_lampiran").modal('hide');
                
                if(result.statusform)
                    $("#status_data_lampiran").hide();
                else
                    $("#status_data_lampiran").show(); 
            }else{
                $("#delete-caution-lampiran").parent("div").show();
            }
        },
        fail:function(){
            $("#delete-caution-lampiran").parent("div").show();
        },
        beforeSend: function(){

            $("#delete_lampiran a").text('Hapus...');
            $("#delete_lampiran #loader").show();
        },
        complete:function(data){
            
            sendProsses.data('run',false);
            $("#delete_lampiran a").text('Hapus');
            $("#delete_lampiran #loader").hide();
        }
    });
});



$("#submitPendidikanFormal").click(function(e){
    e.preventDefault();
    let sendProsses = $(this);
    if($(this).data('run'))return;
    sendProsses.data('run',true);

    let tabledata = $('.pendidikanformal-modal').data('tr');

    $.ajaxSetup({
        headers:{
        'X-CSRF-TOKEN':$('meta[name="_token"]').attr('content')
        } });
    $.ajax({
        url:"/jobseeker/datadiri/submitpendidikanformal/",
        method:"post",
        data :{
            id                             :$("#pendidikanformal #id").val(),
            tingkat_pendidikan             :$("#pendidikanformal #TingkatPendidikan").val(),
            tahun_mulai                    :$("#pendidikanformal #tahunmulai").val(),
            tahun_akhir                    :$("#pendidikanformal #tahunakhir").val(),
            institusi                      :$("#pendidikanformal #institusi").val(),
            tempat                         :$("#pendidikanformal #tempat").val(),
            jurusan                        :$("#pendidikanformal #jurusan").val(),
            IPK                            :$("#pendidikanformal #IPK").val(),
            keterangan                     :$("#pendidikanformal #keterangan").val(),
        },
        success:function(result){
            console.log(result);
            if(result.success){
                if(result.statusform)
                    $(".status_data_pendidikan").hide();
                else
                    $(".status_data_pendidikan").show(); 

                if($("#pendidikanformal #id").val()){

                    tabledata.eq(0).text($("#pendidikanformal #TingkatPendidikan option:selected").text());
                    tabledata.eq(0).data("value",$("#pendidikanformal #TingkatPendidikan").val());
                    tabledata.eq(1).text($("#pendidikanformal #tahunmulai").val()+" - "+$("#pendidikanformal #tahunakhir").val());
                    tabledata.eq(1).data("tanggalmulai",$("#pendidikanformal #tahunmulai").val());
                    tabledata.eq(1).data("tanggalakhir",$("#pendidikanformal #tahunakhir").val());
                    tabledata.eq(2).text($("#pendidikanformal #institusi").val());
                    tabledata.eq(3).text($("#pendidikanformal #tempat").val());
                    tabledata.eq(4).text($("#pendidikanformal #jurusan").val());
                    tabledata.eq(5).text($("#pendidikanformal #IPK").val());
                    tabledata.eq(6).text($("#pendidikanformal #keterangan").val());

                }else{

                    $("#pendidikanformal #id").val(result.id);
                    $('#pendidikan-formal-table tbody').append(
                        `<tr>
                        <th data-value="${result.id}"><h4>${$("#pendidikanformal #TingkatPendidikan option:selected").text()}</h4></th>
                        <th data-tanggalmulai="${$("#pendidikanformal #tahunmulai").val()}" data-tanggalakhir="${$("#pendidikanformal #tahunakhir").val()}"><h4>${$("#pendidikanformal #tahunmulai").val()} - ${$("#pendidikanformal #tahunakhir").val()}</h4></th>
                        <th><h4>${$("#pendidikanformal #institusi").val()}</h4></th>
                        <th><h4>${$("#pendidikanformal #tempat").val()}</h4></th>
                        <th><h4>${$("#pendidikanformal #jurusan").val()}</h4></th>
                        <th><h4>${$("#pendidikanformal #IPK").val()}</h4></th>
                        <th><h4>${$("#pendidikanformal #keterangan").val()}</h4></th>
                        <th><h4>
                        <button data-toggle="modal"  data-target=".pendidikanformal-modal"  data-id="${result.id}" class="btn-outline-primary rounded"><i class="fa fa-edit fa-1x"></i></button>
                        <button data-toggle="modal"  data-target="#deletemodal"  data-id="${result.id}" data-href="datadiri/deletependidikanformal/"  class="btn-outline-danger rounded"><i class="fa fa-trash fa-1x"></i></button>
                          </h4>
                        </th>
                    </tr>`);
                    $('.pendidikanformal-modal').data('tr',$('#pendidikan-formal-table tr').last().find('th'));

                }
            }
                
        },
        beforeSend: function(){

            $("#submitPendidikanFormal a").text('Unggah Data');
            $("#submitPendidikanFormal #loader").show();
        },
        complete:function(data){
            
            sendProsses.data('run',false);
            $("#submitPendidikanFormal a").text('Simpan');
            $("#submitPendidikanFormal #loader").hide();
        }
    });
});

$("#submitPendidikanInformal").click(function(e){
    e.preventDefault();
    let sendProsses = $(this);
    if($(this).data('run'))return;
    sendProsses.data('run',true);

    let tabledata = $('.pendidikaninformal-modal').data('tr');
    
    $.ajaxSetup({
        headers:{
        'X-CSRF-TOKEN':$('meta[name="_token"]').attr('content')
        } });
    $.ajax({
        url:"/jobseeker/datadiri/submitpendidikaninformal/",
        method:"post",
        data :{
            id                             :$("#pendidikaninformal #id").val(),
            jenis_pelatihan                :$("#pendidikaninformal #jenispelatihan").val(),
            tanggal_mulai                  :$("#pendidikaninformal #tahunmulai").val(),
            tanggal_akhir                  :$("#pendidikaninformal #tahunakhir").val(),
            tempat                         :$("#pendidikaninformal #tempat").val(),
            keterangan                     :$("#pendidikaninformal #keterangan").val(),
        },
        success:function(result){
            if(result.success){
                if(result.statusform)
                    $(".status_data_pendidikan").hide();
                else
                    $(".status_data_pendidikan").show(); 

                if($("#pendidikaninformal #id").val()){

                    tabledata.eq(0).text($("#pendidikaninformal #jenispelatihan").val());
                    tabledata.eq(1).text($("#pendidikaninformal #tahunmulai").val()+" - "+$("#pendidikaninformal #tahunakhir").val());
                    tabledata.eq(1).data('tanggalmulai',$("#pendidikaninformal #tahunmulai").val());
                    tabledata.eq(1).data('tanggalakhir',$("#pendidikaninformal #tahunakhir").val());
                    tabledata.eq(2).text($("#pendidikaninformal #tempat").val());
                    tabledata.eq(3).text($("#pendidikaninformal #keterangan").val());

                }else{
                    $("#pendidikaninformal #id").val(result.id);
                    $('#pendidikan-informal-table tbody').append(
                        `<tr>
                        <th><h4>${$("#pendidikaninformal #jenispelatihan").val()}</h4></th>
                        <th><h4>${$("#pendidikaninformal #tahunmulai").val()} - ${$("#pendidikaninformal #tahunakhir").val()}</h4></th>
                        <th><h4>${$("#pendidikaninformal #tempat").val()}</h4></th>
                        <th><h4>${$("#pendidikaninformal #keterangan").val()}</h4></th>
                        <th><h4>
                        <button data-toggle="modal" data-target=".pendidikaninformal-modal" data-id="${result.id}"  class="btn-outline-primary rounded"><i class="fa fa-edit fa-1x"></i></button>
                        <button data-toggle="modal" data-target="#deletemodal" data-id="${result.id}" data-href="datadiri/deletependidikaninformal/"  class="btn-outline-danger rounded"><i class="fa fa-trash fa-1x"></i></button>
                        </h4></th>
                        </tr>`
                    );
                    $('.pendidikanformal-modal').data('tr',$('#pendidikan-informal-table tr').last().find('th'));
                }
            }
        },
        beforeSend: function(){
            // Show image container
            $("#submitPendidikanInformal a").text('Unggah Data');
            $("#submitPendidikanInformal #loader").show()
        },
        complete:function(data){
            sendProsses.data('run',false);
            $("#submitPendidikanInformal a").text('Simpan'); 
            $("#submitPendidikanInformal #loader").hide();
        }
    });
});

$("#submitPendidikanBahasa").click(function(e){
    e.preventDefault();
    let sendProsses = $(this);
    if($(this).data('run'))return;
    sendProsses.data('run',true);
    let tabledata = $('.pendidikanbahasa-modal').data('tr');
    $.ajaxSetup({
        headers:{
        'X-CSRF-TOKEN':$('meta[name="_token"]').attr('content')
        } });
    $.ajax({
        url:"/jobseeker/datadiri/submitpendidikanbahasa/",
        method:"post",
        data :{
            id                            :$("#pendidikanbahasa #id").val(),
            bahasa                        :$("#pendidikanbahasa #bahasa").val(),
            kemampuan_lisan               :$("#pendidikanbahasa #kemampuanlisan").val(),
            kemampuan_tertulis            :$("#pendidikanbahasa #kemampuantertulis").val(),
        },
        success:function(result){
            
            if(result.success){
                if(result.statusform)
                    $(".status_data_pendidikan").hide();
                else
                    $(".status_data_pendidikan").show(); 
                    
                if($("#pendidikanbahasa #id").val()){
                    console.log(result.success,$("#pendidikanbahasa #id").val());
                    tabledata.eq(0).text($('#pendidikanbahasa #bahasa option:selected').text());
                    tabledata.eq(0).data('value',$('#pendidikanbahasa #bahasa').val());
                    tabledata.eq(1).text($('#pendidikanbahasa #kemampuanlisan option:selected').text());
                    tabledata.eq(1).data('value',$('#pendidikanbahasa #kemampuanlisan').val());
                    tabledata.eq(2).text($('#pendidikanbahasa #kemampuantertulis option:selected').text());
                    tabledata.eq(2).data('value',$('#pendidikanbahasa #kemampuantertulis').val());
                }else{
                    $('#pendidikanbahasa #id').val(result.id);
                    $('#pendidikan-bahasa-table tbody').append(`
                    <tr>
                        <th><h4>${$('#pendidikanbahasa #bahasa option:selected').text()}</h4></th>
                        <th><h4>${$('#pendidikanbahasa #kemampuanlisan option:selected').text()}</h4></th>
                        <th><h4>${$('#pendidikanbahasa #kemampuantertulis option:selected').text()} Baik</h4></th>
                        <th><h4>
                            <button class="mx-auto btn-outline-primary rounded"><i class="fa fa-edit fa-1x"></i></button>
                            <button data-target="#deletemodal"  data-href="" class="mx-auto btn-outline-danger rounded"><i class="fa fa-trash fa-1x"></i></button>  
                    </h4></th>
                    </tr>
                    `);
                    $('.pendidibahasa-modal').data('tr',$('#pendidikan-bahasa-table tr').last().find('th'));
                }
            }
        },
        beforeSend: function(){
            // Show image container
            sendProsses.data('run',false);
            $("#submitPendidikanBahasa a").each(function(){
                $(this).text('Unggah Data');
            });
            $("#submitPendidikanBahasa #loader").each(function(){
                $(this).show();
            });
        },
        complete:function(data){
            // Hide image container
            $("#submitPendidikanBahasa a").each(function(){
                $(this).text('Simpan');
            });
            $("#submitPendidikanBahasa #loader").each(function(){
                $(this).hide();
            });
        }
    });
});

$("button#submitIdentitas").each(function(){
        $(this).click(function(e){
            e.preventDefault();
            let sendProsses = $(this);
            if($(this).data('run'))return;
            sendProsses.data('run',true);

            $.ajaxSetup({
                headers:{
                'X-CSRF-TOKEN':$('meta[name="_token"]').attr('content')
                } });

            $.ajax({
                url:"/jobseeker/datadiri/submitdatadiri",
                method:"post",
                data :{
                    NIK                : $("#NIK").val(),
                    nama_lengkap       : $("#NamaLengkap").val(),
                    nama_panggilan     : $("#NamaPanggilan").val(),
                    tempat_lahir       : $("#TempatLahir").val(),
                    tanggal_lahir      : $("#TanggalLahir").val(),
                    jenis_kelamin      : $("#JenisKelamin").val(),
                    agama              : $("#Agama").val(),
                    is_domisiliktp     : ($("#domisiliduplicate").prop("checked")).toString(),
                    alamat_ktp         : $("#Alamatktp").val(),
                    alamat_domisili    : $("#Alamatdomisili").val(),
                    negara_ktp         : $("#Negaraktp").val(),
                    provinsi_ktp       : $("#Provinsiktp").val(),
                    kabkota_ktp        : $("#Kotaktp").val(),
                    kecamatan_ktp      : $("#Kecamatanktp").val(),
                    kode_pos_ktp       : $("#KodePosktp").val(),
                    negara_domisili    : $("#Negaradomisili").val(),
                    provinsi_domisili  : $("#Provinsidomisili").val(),
                    kabkota_domisili   : $("#Kotadomisili").val(),
                    kecamatan_domisili : $("#Kecamatandomisili").val(),
                    kode_pos_domisili  : $("#KodePosdomisili").val(),
                    email              : $("#Email").val(),
                    notelp             : $("#NoTelp").val(),
                    nohp               : $("#NoHP").val(),
                    kategori_idcard    : $("#IDCard").val(),
                    nomor_idcard       : $("#NoIDCard").val(),
                    status_keluarga    : $("#StatusKeluarga").val(),
                    tanggal_keluarga   : $("#TanggalKeluarga").val(),
                    olahraga           : $("#Olahraga").val(),
                    hobi               : $("#Hobi").val(),
                    referensi_dari     : $("#SurveyReferensi").val(),
                },
                success:function(result){
                    if(result.statusIdentitas)
                        $(".status_data_identitas").hide();
                    else
                        $(".status_data_identitas").show();

                    if(result.statusKeluarga)
                        $("#status_data_keluarga").hide();
                    else
                        $("#status_data_keluarga").show(); 

                    if(result.statusAktivitas)
                        $("#status_data_aktivitas").hide();
                    else
                        $("#status_data_aktivitas").show();
                    
                    if(result.statusLainnya)
                        $("#status_data_lainnya").hide();
                    else
                        $("#status_data_lainnya").show(); 
                    
                        console.log(result.success);
                },
                beforeSend: function(){
                    // Show image container
                    $("#submitIdentitas a").each(function(){
                        $(this).text('Unggah Data');
                    });
                    $("#submitIdentitas #loader").each(function(){
                        $(this).show();
                    });
                },
                complete:function(data){
                    // Hide image container
                    sendProsses.data('run',false);
                    $("#submitIdentitas a").each(function(){
                        $(this).text('Simpan');
                    });
                    $("#submitIdentitas #loader").each(function(){
                        $(this).hide();
                    });
                }
            });
     });
});

$("#submitRiwayatPenyakit").click(function(e){
            e.preventDefault();
            let sendProsses = $(this);
            if($(this).data('run'))return;
            sendProsses.data('run',true);

            let tabledata = $('.riwayatpenyakit-modal').data('tr');

            $.ajaxSetup({
                headers:{
                'X-CSRF-TOKEN':$('meta[name="_token"]').attr('content')
                } });
            $.ajax({
                url:"/jobseeker/datadiri/submitriwayatpenyakit",
                method:"post",
                data :{
                    id                : $("#lainnya #id").val(),
                    nama_penyakit     : $("#lainnya #NamaPenyakit").val(),
                    tanggal_mulai     : $("#lainnya #TahunMulai").val(),
                    tanggal_akhir     : $("#lainnya #TahunAkhir").val(),
                    pengaruh          : $("#lainnya #Pengaruh").val(),
                },
                success:function(result){
                    console.log(result.success);
                    if(result.success)
                    {
                        if(result.statusform)
                            $("#status_data_lainnya").hide();
                        else
                            $("#status_data_lainnya").show(); 

                        if($("#lainnya #id").val()){
                            tabledata.eq(0).text($("#lainnya #NamaPenyakit").val());
                            tabledata.eq(1).text($("#lainnya #TahunMulai").val()+" - "+$("#lainnya #TahunAkhir").val());
                            tabledata.eq(1).data("tanggalmulai",$("#lainnya #TahunMulai").val());
                            tabledata.eq(1).data("tanggalakhir",$("#lainnya #TahunAkhir").val());
                            tabledata.eq(2).text($("#lainnya #Pengaruh").val());
                        }
                        else{
                            $('#lainnya #id').val(result.id);
                            $('#riwayatpenyakit-table tbody').append(
                                `
                                <tr>
                                <th><h4>${$("#lainnya #NamaPenyakit").val()}</h4></th>
                                <th><h4>${$("#lainnya #TahunMulai").val()} - ${$("#lainnya #TahunAkhir").val()}</h4></th>
                                <th><h4>${$("#lainnya #Pengaruh").val()}</h4></th>
                                <th width="10%"><h4>
                                <button data-toggle="modal" data-target=".riwayatpenyakit-modal" data-id="${result.id}" class="mx-auto btn-outline-primary rounded"><i class="fa fa-edit fa-1x"></i></button>
                                <button data-toggle="modal" data-target="#deletemodal"  data-id="${result.id}" data-href="datadiri/deleteriwayatpenyakit/"  class="btn-outline-danger rounded"><i class="fa fa-trash fa-1x"></i></button>
                                </h4></th>
                                </tr>`
                            );
                            $('.riwayatpenyakit-modal').data('tr',$('#riwayatpenyakit-table tr').last().find('th'));
                        }
                    }
                },
                beforeSend: function(){
                    // Show image container
                    $("#submitRiwayatPenyakit a").each(function(){
                        $(this).text('Unggah Data');
                    });
                    $("#submitRiwayatPenyakit #loader").each(function(){
                        $(this).show();
                    });
                },
                complete:function(data){
                    // Hide image container
                    sendProsses.data('run',false);
                    $("#submitRiwayatPenyakit a").each(function(){
                        $(this).text('Simpan');
                    });
                    $("#submitRiwayatPenyakit #loader").each(function(){
                        $(this).hide();
                    });
                }
            });
        });
        
$("#submitPengalamanOrganisasi").click(function(e){
    e.preventDefault();
    let sendProsses = $(this);
    if($(this).data('run'))return;
    sendProsses.data('run',true);

    let tabledata = $('.aktivitas-modal').data('tr');
    
    $.ajaxSetup({
        headers:{
        'X-CSRF-TOKEN':$('meta[name="_token"]').attr('content')
        } });
    $.ajax({
        url:"/jobseeker/datadiri/submitpengalamanorganisasi",
        method:"post",
        data :{
            id              : $("#aktivitas #id").val(),
            organisasi      : $("#aktivitas #Organisasi").val(),
            tanggal_mulai   : $("#aktivitas #TahunMulai").val(),
            tanggal_akhir   : $("#aktivitas #TahunAkhir").val(),
            tempat          : $("#aktivitas #Tempat").val(),
            posisi          : $("#aktivitas #Posisi").val(),
            keterangan      : $("#aktivitas #Keterangan").val(),
        },
        success:function(result){
            console.log(result.success);
            if(result.success){
            if(result.statusform)
                $("#status_data_aktivitas").hide();
            else
                $("#status_data_aktivitas").show(); 

            if($('#aktivitas #id').val()){
                tabledata.eq(0).text($("#aktivitas #Organisasi").val());
                tabledata.eq(1).text($("#aktivitas #TahunMulai").val()+" - "+$("#aktivitas #TahunAkhir").val());
                tabledata.eq(1).data("tanggalmulai",$("#aktivitas #TahunMulai").val());
                tabledata.eq(1).data("tanggalakhir",$("#aktivitas #TahunAkhir").val());
                tabledata.eq(2).text($("#aktivitas #Tempat").val());
                tabledata.eq(3).text($("#aktivitas #Posisi").val());
                tabledata.eq(4).text($("#aktivitas #Keterangan").val());
             }else{
                $('#aktivitas #id').val(result.id);
                $("#aktivitas-table tbody").append(
                    `<tr>
                    <th><h4>${$("#aktivitas #Organisasi").val()}</h4></th>
                    <th><h4>${$("#aktivitas #TahunMulai").val()} - ${$("#aktivitas #TahunAkhir").val()}</h4></th>
                    <th><h4>${$("#aktivitas #Tempat").val()}</h4></th>
                    <th><h4>${$("#aktivitas #Posisi").val()}</h4></th>
                    <th><h4>${$("#aktivitas #Keterangan").val()}</h4></th>
                    <th width="10%"><h4>
                        <button data-toggle="modal"  data-target=".aktivitas-modal" data-id="${result.id}" class="mx-auto btn-outline-primary rounded"><i class="fa fa-edit fa-1x"></i></button>
                        <button data-toggle="modal"  data-target="#deletemodal"  data-id="${result.id}" data-href="datadiri/deletepengalamanorganisasi/"  class="btn-outline-danger rounded"><i class="fa fa-trash fa-1x"></i></button>
                    </h4></th>
                </tr>`
                 );
                $('.aktivitas-modal').data('tr',$('#aktivitas-table tr').last().find('th'));
             }
            }
        },
        beforeSend: function(){
            // Show image container
            $("#submitPengalamanOrganisasi a").text('Unggah Data');
            $("#submitPengalamanOrganisasi #loader").show();
        },
        complete:function(data){
            // Hide image container
            sendProsses.data('run',false);
            $("#submitPengalamanOrganisasi a").text('Simpan');
            $("#submitPengalamanOrganisasi #loader").hide();
        }
    });
});

$("#submitMinat").click(function(e){
    e.preventDefault();
    let sendProsses = $(this);
    if($(this).data('run'))return;
    sendProsses.data('run',true);
    let tabledata = $('.minat-modal').data('tr');
    $.ajaxSetup({
        headers:{
        'X-CSRF-TOKEN':$('meta[name="_token"]').attr('content')
        } });
    $.ajax({
        url:"/jobseeker/datadiri/submitminat",
        method:"post",
        data :{
            id               : $("#minat #id").val(),
            bidang_bisnis    : $("#minat #BidangBisnis").val(),
            lingkungan_kerja : $('#minat #LingkunganKerja').val(),
            spesialisasi     : $('#minat #Spesialisasi').val(),
            posisi_kerja     : $('#minat #PosisiKerja').val(),
            level_jabatan    : $('#minat #LevelJabatan').val(),
            gaji_bulanan     : $("#minat #GajiBulan").val(),
        },
        success:function(result){
            console.log(result.success);
            if(result.success){
                if(result.statusform)
                    $(".status_data_minat").hide();
                else
                    $(".status_data_minat").show(); 

                if($("#minat #id").val()){
                    tabledata.eq(0).text($("#minat #BidangBisnis  option:selected").text());
                    tabledata.eq(1).text($('#minat #LingkunganKerja  option:selected').text());
                    tabledata.eq(1).data("value",$('#minat #LingkunganKerja').val());
                    tabledata.eq(2).text($('#minat #Spesialisasi  option:selected').text());
                    tabledata.eq(2).data("value",$('#minat #Spesialisasi').val());
                    tabledata.eq(3).text($('#minat #PosisiKerja  option:selected').text());
                    tabledata.eq(3).data("value",$('#minat #PosisiKerja').val());
                    tabledata.eq(4).text($('#minat #LevelJabatan  option:selected').text());
                    tabledata.eq(4).data("value",$('#minat #LevelJabatan').val());
                    tabledata.eq(5).text("Rp."+$("#minat #_GajiBulan").val()+",00");
                }else{
                    $('#minat #id').val(result.id);
                    $('#minat-table tbody').append(`
                    <tr>
                    <th data-value="">${$("#minat #BidangBisnis option:selected").text()}</th>
                    <th data-value="">${$("#minat #LingkunganKerja option:selected").text()}</th>
                    <th data-value="">${$('#minat #Spesialisasi option:selected').text()}</th>
                    <th data-value="">${$('#minat #PosisiKerja option:selected').text()}</th>
                    <th data-value="">${$('#minat #LevelJabatan option:selected').text()}</th>
                    <th data-value="">Rp. ${$("#minat #_GajiBulan").val()},00</th>
                    <th>
                    <button data-toggle="modal" data-target=".modal-minat" data-id="${result.id}" class="mx-auto btn-outline-primary rounded"><i class="fa fa-edit fa-1x"></i></button>
                    <button data-toggle="modal"  data-target="#deletemodal"  data-id="${result.id}" data-href="datadiri/deleteminat/"  class="btn-outline-danger rounded"><i class="fa fa-trash fa-1x"></i></button>
                    </th>
                    </tr>`);
                    $('.minat-modal').data('tr',$('#minat-table tr').last().find('th'));
                }
            }
        },
        beforeSend: function(){
            // Show image container
            $("#submitMinat a").text('Unggah Data');
            $("#submitMinat #loader").show();
        },
        complete:function(data){
            // Hide image container
            sendProsses.data('run',false);
            $("#submitMinat a").text('Simpan');
            $("#submitMinat #loader").hide();
        }
    });
});

$("#submitRiwayatPekerjaan").click(function(e){
    e.preventDefault();
    let sendProsses = $(this);
    if($(this).data('run'))return;
    sendProsses.data('run',true);
    
    let tabledata = $('.pengalamankerja-modal').data('tr');

    $.ajaxSetup({
        headers:{
        'X-CSRF-TOKEN':$('meta[name="_token"]').attr('content')
        } });
    $.ajax({
        url:"/jobseeker/datadiri/submitpengalamankerja",
        method:"post",
        data :{
            id               : $("#pekerjaan #id").val(),
            nama_perusahaan  : $("#pekerjaan #NamaPerusahaan").val(),
            bisnis_perusahaan: $("#pekerjaan #BisnisPerusahaan").val(),
            lokasi_perusahaan: $("#pekerjaan #TempatKerja").val(),
            tanggal_mulai    : $("#pekerjaan #TahunMulai").val(),
            tanggal_akhir    : $("#pekerjaan #TahunAkhir").val(),
            lokasi_kerja      : $("#pekerjaan #TempatKerja").val(),
            posisi           : $("#pekerjaan #Posisi").val(),
            bawahan          : $('#pekerjaan #Bawahan').val(),
            gaji_terakhir    : $('#pekerjaan #GajiTerakhir').val(),
            alasan_pindah    : $('#pekerjaan #AlasanPindah').val(),
            keterangan       : $('#pekerjaan #Keterangan').val(),
        },
        success:function(result){
            console.log(result.success);
            if(result.success){
                if(result.statusform)
                    $(".status_data_pekerjaan").hide();
                else
                    $(".status_data_pekerjaan").show(); 

                if($('#pekerjaan #id').val()){
                    console.log('overwrite');
                    tabledata.eq(0).text($("#pekerjaan #NamaPerusahaan").val());
                    tabledata.eq(1).text($("#pekerjaan #BisnisPerusahaan option:selected").text());
                    tabledata.eq(1).data('value',$("#pekerjaan #BisnisPerusahaan").val());
                    tabledata.eq(2).text($("#pekerjaan #TahunMulai").val()+" - "+$("#pekerjaan #TahunAkhir").val());
                    tabledata.eq(2).data('tanggalmulai',$("#pekerjaan #TahunMulai").val());
                    tabledata.eq(2).data('tanggalakhir',$("#pekerjaan #TahunAkhir").val());
                    tabledata.eq(3).text($("#pekerjaan #TempatKerja").val());
                    tabledata.eq(4).text($("#pekerjaan #Posisi").val());
                    tabledata.eq(5).text($('#pekerjaan #Bawahan').val());
                    tabledata.eq(6).text("Rp."+$('#pekerjaan #_GajiTerakhir').val()+",00");
                    tabledata.eq(7).text($('#pekerjaan #AlasanPindah').val());
                    tabledata.eq(8).text($('#pekerjaan #Keterangan').val());
                }else{
                    console.log('append');
                    $('#pekerjaan #id').val(result.id);
                    $('#riwayatpekerjaan-table tbody').append(`
                    <tr>
                    <th>${$("#pekerjaan #NamaPerusahaan").val()}</th>
                    <th>${$("#pekerjaan #BisnisPerusahaan option:selected").text()}</th>
                    <th>${$("#pekerjaan #TahunMulai").val()} - ${$("#pekerjaan #TahunAkhir").val()}</th>
                    <th>${$("#pekerjaan #TempatKerja").val()}</th>
                    <th>${$("#pekerjaan #Posisi").val()}</th>
                    <th>${$('#pekerjaan #Bawahan').val()}</th>
                    <th>Rp. ${$('#pekerjaan #_GajiTerakhir').val()}</th>
                    <th>${$('#pekerjaan #AlasanPindah').val()}</th>
                    <th>${$('#pekerjaan #Keterangan').val()}</th>
                    <th>
                        <button data-toggle="modal"  data-target=".pengalamankerja-modal" data-id="${result.id}" class="mx-auto btn-outline-primary rounded"><i class="fa fa-edit fa-1x"></i></button>
                        <button data-toggle="modal"  data-target="#deletemodal"  data-id="${result.id}" data-href="datadiri/deletepengalamankerja/"  class="btn-outline-danger rounded"><i class="fa fa-trash fa-1x"></i></button>
                    </th>
                    </tr>`);
                    $('.pengalamankerja-modal').data('tr',$('#riwayatpekerjaan-table tr').last().find('th'));
                }
                
            }
        },
        beforeSend: function(){
            // Show image container
            $("#submitRiwayatPekerjaan a").text('Unggah Data');
            $("#submitRiwayatPekerjaan #loader").show();
        },
        complete:function(data){
            // Hide image container
            sendProsses.data('run',false);
            $("#submitRiwayatPekerjaan a").text('Simpan');
            $("#submitRiwayatPekerjaan #loader").hide();
        }
    });
});
$('#domisiliduplicate').prop("checked",false);
$('#domisiliduplicate').click(function (){
	if($(this).prop("checked")){
        $('#domisili').slideUp();
	}else{
		$('#domisili').slideDown();
	}
});

$('#RiwayatKerjaModal  #_GajiTerakhir').keyup(function(){
    let val = $(this).val();
    let valInt = getAngka(val);
    $('#RiwayatKerjaModal  #_GajiTerakhir').val(formatRp(val));
    $('#RiwayatKerjaModal  #GajiTerakhir').val(valInt);
});

$('#MinatKerjaModal  #_GajiBulan').keyup(function(){
    let val = $(this).val();
    let valInt = parseInt(val.replace(/[^0-9]+/g,""));
    $('#MinatKerjaModal  #_GajiBulan').val(formatRp(val));
    $('#MinatKerjaModal  #GajiBulan').val(valInt);
});

$(".typeTahun").each( function(){$(this).datepicker({
    format : "yyyy",
    minViewMode : "years",
    maxViewMode : "years",
    container:"#"+$(this).next(1).attr("id")
});
});

$(".typeBulan").each( function(){$(this).datepicker({
    format : "yyyy",
    minViewMode : "months",
    maxViewMode : "years",
    container:"#"+$(this).next(1).attr("id")
});
});

$('#TanggalLahir').datepicker(inputBirth);
$(".datepicker:focus").parent()

$(".preview-file").click(function(e){
    e.preventDefault();
    let url = "";
    let isUploaded = $(this).parents(".block-action").hasClass("isUploaded");
    let previewFile = $(this).parents("form").find('input[type="file"]')[0].files[0];
    if(isUploaded){
        url = $(this).data("href");
    }
    else{
        url = window.URL.createObjectURL(previewFile);
    }
    
    window.open(url,"_blank",widget=500,height=500);
});


$(".submit-file").click(function(e){
    e.preventDefault();

    let sendProsses = $(this);
    if($(this).data('run'))return;
    sendProsses.data('run',true);
    

    let form = $(this).parents('form');
    let file=form.find('input[type="file"]')[0].files[0];
    let sendData = new FormData();

    sendData.append(form.attr('id'),file);
    
    $.ajaxSetup({
        headers:{
        'X-CSRF-TOKEN':$('meta[name="_token"]').attr('content')
        } });
    $.ajax({
        url:"/jobseeker/datadiri/submitlampiran",
        method:"post",
        data :sendData,
        processData: false,
        contentType: false,
        success:function(result){
            console.log('success');
            if(result.success){
                if(result.statusform)
                    $("#status_data_lampiran").hide();
                else
                    $("#status_data_lampiran").show(); 

                sendProsses.slideUp();
                let blockAction = form.children().eq(1);
                blockAction.addClass("isUploaded");
                blockAction.find(".close-file").slideUp();
                blockAction.find(".del-file").slideDown();
            }
        },
        beforeSend: function(){
            // Show image container
            sendProsses.find('a').text('Unggah Data');
            sendProsses.find('#loader').show();
        },
        complete:function(data){
            // Hide image container
            sendProsses.data('run',false);
            sendProsses.find('a').text('Unggah');
            sendProsses.find('#loader').hide();
        }
    });
});

$('#lampiran form input[type="file"]').change(function(){
    
    let sectLampiran = $(this).parents("form").children();
    sectLampiran.eq(0).slideUp();

    sectLampiran.eq(1).find(".submit-file").show();
    sectLampiran.eq(1).find(".close-file").show();
    sectLampiran.eq(1).find("h3.title").text($(this)[0].files[0].name);
    sectLampiran.eq(1).find(".del-file").hide();
    sectLampiran.eq(1).slideDown();
});

$(".close-file").click(function(e){
    e.preventDefault();
    let sectLampiran = $(this).parents("form").children();
    sectLampiran.eq(0).slideDown();
    sectLampiran.eq(1).slideUp();
});
//end document ready
});

function getst(id,param,selectedTarget){
    console.log('start');
    let now = $.now();
    $.ajaxSetup({
        headers:{
        'X-CSRF-TOKEN':$('meta[name="_token"]').attr('content')
        } });
    $.ajax({
        url:"/jobseeker/support/getst/",
        method:"post",
        data :{
            st_category : id,
            st_id       :param
        },
        success:function(result){
            console.log($.now()-now);
            for(var item in result.data){
              let option = result.data[item];
              selectedTarget.prop("disabled",false);
              selectedTarget.append($('<option>',{
                  value : option.id,
                  text  : option.name
                }));
          }},
          fail:function(result){
            console.log(result);
          }
        
    });
    
};

//Callback Alamat
$("#identitas #Negaraktp").change(function(){
    $("#identitas #Provinsiktp option").remove().end();
    $("#identitas #Provinsiktp").append($('<option>',{
        value : "",
        text  : "Pilih . . ."
    }));
    $("#identitas #Kotaktp option").remove().end();
    $("#identitas #Kotaktp").append($('<option>',{
        value : "",
        text  : "Pilih . . ."
    }));
    $("#identitas #Kecamatanktp option").remove().end();
    $("#identitas #Kecamatanktp").append($('<option>',{
        value : "",
        text  : "Pilih . . ."
    }));

    if(this.value==0){
        $("#identitas #Provinsiktp").prop("disabled",true);
        $("#identitas #Kotaktp").prop("disabled",true);
        $("#identitas #Kecamatanktp").prop("disabled",true);
    }
   else
        getst("Negara",$("#identitas #Negaraktp > option:selected").val(),$("#identitas #Provinsiktp"));
});

$("#identitas #Provinsiktp").change(function(){
    
    $("#identitas #Kotaktp option").remove().end();
    $("#identitas #Kotaktp").append($('<option>',{
        value : "0",
        text  : "Pilih . . ."
    }));
    $("#identitas #Kecamatanktp option").remove().end();
    $("#identitas #Kecamatanktp").append($('<option>',{
        value : "",
        text  : "Pilih . . ."
    }));

    if(this.value==0){
        $("#identitas #Kotaktp").prop("disabled",true);
        $("#identitas #Kecamatanktp").prop("disabled",true);
    }
    else
         getst("Provinsi",$("#identitas #Provinsiktp > option:selected").val(),$("#identitas #Kotaktp"));
 });

 $("#identitas #Kotaktp").change(function(){
    $("#identitas #Kecamatanktp option").remove().end();
    $("#identitas #Kecamatanktp").append($('<option>',{
        value : "0",
        text  : "Pilih . . ."
    }));

    if(this.value==0)
        $("#identitas #Kecamatanktp").prop("disabled",true);
    else
        getst("Kota",$("#identitas #Kotaktp > option:selected").val(),$("#identitas #Kecamatanktp"));
 });

 $("#identitas #Negaradomisili").change(function(){
    $("#identitas #Provinsidomisili").find('option').remove().end();
    $("#identitas #Provinsidomisili").append($('<option>',{
        value : "",
        text  : "Pilih . . ."
    }));
    $("#identitas #Kotadomisili").find('option').remove().end();
    $("#identitas #Kotadomisili").append($('<option>',{
        value : "",
        text  : "Pilih . . ."
    }));
    $("#identitas #Kecamatandomisili").find('option').remove().end();
    $("#identitas #Kecamatandomisili").append($('<option>',{
        value : "",
        text  : "Pilih . . ."
    }));
    if(this.value==0){
        $("#identitas #Provinsidomisili").prop("disabled",true);
        $("#identitas #Kotakdomisili").prop("disabled",true);
        $("#identitas #Kecamatandomisili").prop("disabled",true);
    }
   else
        getst("Negara",$("#identitas #Negaradomisili > option:selected").val(),$("#identitas #Provinsidomisili"));
});

$("#identitas #Provinsidomisili").change(function(){
    
    $("#identitas #Kotadomisili").find('option').remove().end();
    $("#identitas #Kotadomisili").append($('<option>',{
        value : "0",
        text  : "Pilih . . ."
    }));
    $("#identitas #Kecamatandomisili").find('option').remove().end();
    $("#identitas #Kecamatandomisili").append($('<option>',{
        value : "",
        text  : "Pilih . . ."
    }));

    if(this.value==0){
        $("#identitas #Kotadomisili").prop("disabled",true);
        $("#identitas #Kecamatandomisili").prop("disabled",true);
    }
    else
         getst("Provinsi",$("#identitas #Provinsidomisili > option:selected").val(),$("#identitas #Kotadomisili"));
 });

 $("#identitas #Kotadomisili").change(function(){
    $("#identitas #Kecamatandomisili").find('option').remove().end();
    $("#identitas #Kecamatandomisili").append($('<option>',{
        value : "0",
        text  : "Pilih . . ."
    }));

    if(this.value==0)
        $("#identitas #Kecamatandomisili").prop("disabled",true);
    else
        getst("Kota",$("#identitas #Kotadomisili > option:selected").val(),$("#identitas #Kecamatandomisili"));
 });


$('.modal').on('shown.bs.modal', function () {
    $('html,body').animate({ scrollTop: 0 }, '500');
})

function formatRp(angka){
    let number_string = (angka).replace(/[^,\d]/g, '').toString(),
    split   		= number_string.split(','),
    sisa     		= split[0].length % 3,
    rupiah     		= split[0].substr(0, sisa),
    ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

    if(ribuan){
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }

    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return rupiah;
}

function getAngka(angka){
    let number_string = angka.replace(/[^0-9,]/g, '').toString();
    number_string = number_string.split(',');
    return number_string[0];
}