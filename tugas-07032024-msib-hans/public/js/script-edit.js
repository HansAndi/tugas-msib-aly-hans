$(function () {
  function initializeModalTambah(options) {
    $("#judulModal").html(options.modalTitle);
    $(".modal-footer button[type=submit]").html(options.submitButtonText);
    $(".modal-body form").attr("action", options.formAction);

    // Clear input fields
    options.inputIds.forEach(function (id) {
      $("#" + id).val("");
    });
  }

  function initializeModalEdit(options) {
    $("#judulModal").html(options.modalTitle);
    $(".modal-footer button[type=submit]").html(options.submitButtonText);
    $(".modal-body form").attr("action", options.formAction);
  }

  function populateEditModal(id, url, inputIds) {
    $.ajax({
      url: url,
      data: { id: id },
      method: "post",
      dataType: "json",
      success: function (data) {
        inputIds.forEach(function (id, index) {
          $("#" + id).val(data[id]);
        });
      },
    });
  }

  const url = "/php-peminjaman/public/";

  // const inputPenulis = ["nama_penulis", "id"];

  // $(".tambahPenulis").on("click", function () {
  //   initializeModalTambah({
  //     modalTitle: "Tambah Penulis",
  //     submitButtonText: "Tambah Data",
  //     formAction: url + "penulis/tambah",
  //     inputIds: inputPenulis,
  //   });
  // });

  // $(".editPenulis").on("click", function () {
  //   initializeModalEdit({
  //     modalTitle: "Edit Penulis",
  //     submitButtonText: "Edit Data",
  //     formAction: url + "penulis/edit",
  //     // inputIds: inputPenulis.slice(0, inputPenulis.length - 1),
  //   });

  //   const id = $(this).data("id");

  //   populateEditModal(id, url + "penulis/getEdit", inputPenulis);
  // });

  // const inputPenerbit = ["nama_penerbit", "id"];

  // $(".tambahPenerbit").on("click", function () {
  //   initializeModalTambah({
  //     modalTitle: "Tambah Penerbit",
  //     submitButtonText: "Tambah Data",
  //     formAction: url + "penerbit/tambah",
  //     inputIds: inputPenerbit,
  //   });
  // });

  // $(".editPenerbit").on("click", function () {
  //   initializeModalEdit({
  //     modalTitle: "Edit Penerbit",
  //     submitButtonText: "Edit Data",
  //     formAction: url + "penerbit/edit",
  //     // inputIds: ["nama_penerbit", "id"],
  //   });

  //   const id = $(this).data("id");

  //   populateEditModal(id, url + "penerbit/getEdit", inputPenerbit);
  // });

  switch (window.location.pathname) {
    case url + "penulis":
      const inputPenulis = ["nama_penulis", "id"];

      $(".tambahPenulis").on("click", function () {
        initializeModalTambah({
          modalTitle: "Tambah Penulis",
          submitButtonText: "Tambah Data",
          formAction: url + "penulis/tambah",
          inputIds: inputPenulis,
        });
      });

      $(".editPenulis").on("click", function () {
        initializeModalEdit({
          modalTitle: "Edit Penulis",
          submitButtonText: "Edit Data",
          formAction: url + "penulis/edit",
        });

        const id = $(this).data("id");

        populateEditModal(id, url + "penulis/getEdit", inputPenulis);
      });
      break;

    case url + "penerbit":
      const inputPenerbit = ["nama_penerbit", "id"];

      $(".tambahPenerbit").on("click", function () {
        initializeModalTambah({
          modalTitle: "Tambah Penerbit",
          submitButtonText: "Tambah Data",
          formAction: url + "penerbit/tambah",
          inputIds: inputPenerbit,
        });
      });

      $(".editPenerbit").on("click", function () {
        initializeModalEdit({
          modalTitle: "Edit Penerbit",
          submitButtonText: "Edit Data",
          formAction: url + "penerbit/edit",
        });

        const id = $(this).data("id");

        populateEditModal(id, url + "penerbit/getEdit", inputPenerbit);
      });
      break;

    case url + "kategori":
      const inputKategori = ["nama_kategori", "id"];

      $(".tambahKategori").on("click", function () {
        initializeModalTambah({
          modalTitle: "Tambah Kategori",
          submitButtonText: "Tambah Data",
          formAction: url + "kategori/tambah",
          inputIds: inputKategori,
        });
      });

      $(".editKategori").on("click", function () {
        initializeModalEdit({
          modalTitle: "Edit Kategori",
          submitButtonText: "Edit Data",
          formAction: url + "kategori/edit",
        });

        const id = $(this).data("id");

        populateEditModal(id, url + "kategori/getEdit", inputKategori);
      });
      break;

    case url + "buku":
      const inputBuku = [
        "judul",
        "penulis_id",
        "penerbit_id",
        "kategori_id",
        "tahun",
        "id",
      ];

      $(".tambahBuku").on("click", function () {
        initializeModalTambah({
          modalTitle: "Tambah Buku",
          submitButtonText: "Tambah Data",
          formAction: url + "buku/tambah",
          inputIds: inputBuku,
        });
      });

      $(".editBuku").on("click", function () {
        initializeModalEdit({
          modalTitle: "Edit Buku",
          submitButtonText: "Edit Data",
          formAction: url + "buku/edit",
        });

        const id = $(this).data("id");

        populateEditModal(id, url + "buku/getEdit", inputBuku);
      });
  }
});
