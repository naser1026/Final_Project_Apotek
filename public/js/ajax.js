$(function () {

 
  $(".addProduct").on("click", function () {
    $("#staticBackdropLabel").html("Tambah Data Produk");
    $(".modal-footer button[type=submit]").html("Tambah");

    $("#name").val("");
    $("#large_barcode").val("");
    $("#small_barcode").val("");
    $("#factory").val("");
    $("#large_unit").val("");
    $("#small_unit").val("");
    $("#large_price").val("");
    $("#small_price").val("");
    $("#suplier").val("");
    $("#fill").val("");
  });


  
  $(".changeModal").on("click", function () {
    const id = $(this).data("id");
    const baseurl = $(this).data("url");

    $("#staticBackdropLabel").html("Ubah Data Produk");
    $(".modal-footer button[type=submit]").html("Ubah Data");
    $(".modal-body form").attr(
      "action",
      baseurl + "masterdata/masterproductUpdate"
    );

    $.ajax({
      url: baseurl + "masterdata/masterproductGetEdit",
      data: { id: id },
      method: "post",
      dataType: "json",
      success: function (data) {
        $("#id").val(data.id_product_tmp);
        $("#name").val(data.name_tmp);
        $("#large_barcode").val(data.large_barcode_tmp);
        $("#small_barcode").val(data.small_barcode_tmp);
        $("#factory").val(data.id_factory_tmp);
        $("#large_unit").val(data.id_large_unit_tmp);
        $("#small_unit").val(data.id_small_unit_tmp);
        $("#large_price").val(data.large_price_tmp);
        $("#small_price").val(data.small_price_tmp);
        $("#suplier").val(data.id_suplier_tmp);
        $("#fill").val(data.fill_tmp);
      },
    });
  });


  $(".unitModalAdd").on("click", function () {
    $("#staticBackdropLabel").html("Tambah Data Unit");
    $(".modal-footer button[type=submit]").html("Tambah");
    
    $("#name").val("+");
    $("#information").val("");
  });
1

  $(".unitModalUpdate").on("click", function () {
    const id = $(this).data("id");
    const baseurl = $(this).data("url");

    $("#staticBackdropLabel").html("Ubah Data Unit");
    $(".modal-footer button[type=submit]").html("Ubah Data");
    $(".modal-body form").attr(
      "action",
      baseurl + "masterdata/masterunitUpdate"
    );

    $.ajax({
      url: baseurl + "masterdata/masterunitGetEdit",
      data: { id: id },
      method: "post",
      dataType: "json",
      success: function (data) {
        $("#id").val(data.id_unit_tmun);
        $("#name").val(data.name_tmun);
        $("#information").val(data.information_tmun);
      },
    });
  });

  $(".factoryModalUpdate").on("click", function () {
    const id = $(this).data("id");
    const baseurl = $(this).data("url");

    $("#staticBackdropLabel").html("Ubah Data Pabrik");
    $(".modal-footer button[type=submit]").html("Ubah Data");
    $(".modal-body form").attr(
      "action",
      baseurl + "masterdata/masterfactoryUpdate"
    );

    $.ajax({
      url: baseurl + "masterdata/masterfactoryGetEdit",
      data: { id: id },
      method: "post",
      dataType: "json",
      success: function (data) {
        $("#id").val(data.id_factory_tmf);
        $("#name").val(data.name_tmf);
      },
    });
  });
  
  $(".suplierModalUpdate").on("click", function () {
    const id = $(this).data("id");
    const baseurl = $(this).data("url");
    

    $("#staticBackdropLabel").html("Ubah Data Suplier");
    $(".modal-footer button[type=submit]").html("Ubah Data");
    $(".modal-body form").attr(
      "action",
      baseurl + "masterdata/mastersuplierUpdate"
    );

    $.ajax({
      url: baseurl + "masterdata/mastersuplierGetEdit",
      data: { id: id },
      method: "post",
      dataType: "json",
      success: function (data) {
        $("#id").val(data.id_suplier_tms);
        $("#name").val(data.name_tms);
        $("#email").val(data.email_tms);
        $("#address").val(data.address_tms);
        $("#contact").val(data.phone_number_tms);
        $("#website").val(data.website_tms);
        $("#information").val(data.information_tms);
      },
    });
  });


  $(".suplierModalAdd").on("click", function () {
    $("#staticBackdropLabel").html("Tambah Data Produk");
    $(".modal-footer button[type=submit]").html("Tambah");

    $("#name").val("");
    $("#email").val("-");
    $("#address").val("-");
    $("#contact").val("-");
    $("#website").val("-");
    $("#information").val("-");
    
  });

});









