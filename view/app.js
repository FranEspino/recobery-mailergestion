$(document).ready(function () {
  list_Client();
  register_client();
  delete_client();
  edit_client();
  function list_Client() {
    $.ajax({
      url: "./controller/get_clientes.php",
      type: "GET",
      success: function (response) {
        let clientsObject = JSON.parse(response);
        let row_design = "";
        clientsObject.forEach((client) => {
          row_design += `
              <tr client_id="${client.id}">
                    <td>
                    <p class="text-xs text-center font-weight-bold mb-0">${client.id}</p>
                    </td>
                    <td>
                        <div class="d-flex px-2 py-1">
                        <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">${client.nombres}</h6>
                        </div>
                        </div>
                    </td>
                    <td>
                        <p class="text-xs font-weight-bold mb-0">${client.correo}</p>
                    </td>
                    <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-success">${client.categoria}</span>
                    </td>
                    <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">${client.telefono}</span>
                    </td>
                    
                    <td class="px-0 text-center">
                    <button type="button" class="btn btn-success text-xs client-edit"
                    data-bs-toggle="modal" data-bs-target="#editDriver" 
                    data-bs-whatever="@mdo"><i class="fas fa-edit"></i></button>
                    <button id="client-delete" type="button" class="client-delete btn btn-danger  text-xs"><i class="far fa-trash-alt"></i></button>
                    </td>
          </tr>
          `;
        });
        $("#clients").html(row_design);
      },
    });
  }

  function register_client() {
    $("#error-form").addClass("d-none");

    $("#cliente-form").submit(function (e) {
      var parametros = new FormData($("#cliente-form")[0]);
      /*for (var pair of parametros.entries()) {
        console.log(pair[0] + ", " + pair[1]);
      } */
      $.ajax({
        data: parametros,
        url: "./controller/post_cliente.php",
        type: "POST",
        contentType: false,
        processData: false,
        success: function (response) {
          list_Client();
          document.getElementById("cliente-form").reset();
          $("#exampleModal").modal("hide");
        },
        error: function (request, error) {
          var errorMessage = JSON.parse(request.responseText);
          $("#error-form").fadeIn();
          $("#error-form").removeClass("d-none");
          $("#error-form").html(errorMessage.message);
        },
      });
      e.preventDefault();
    });
  }

  function delete_client() {
    $(document).on("click", ".client-delete", function () {
      const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: "btn btn-success ms-2",
          cancelButton: "btn btn-danger",
        },
        buttonsStyling: false,
      });
      swalWithBootstrapButtons
        .fire({
          title: "¿Desea eliminar cliente?",
          text: "Se borrará de la base base de datos.",
          icon: "warning",
          showCancelButton: true,
          confirmButtonText: "Si, Eliminar",
          cancelButtonText: "No, Cancelar!",
          reverseButtons: true,
        })
        .then((result) => {
          if (result.value) {
            swalWithBootstrapButtons.fire(
              "Eliminado!",
              "Cliente eliminado satisfactoriamente.",
              "success"
            );
            let element = $(this)[0].parentElement.parentElement;
            let id_client_f = $(element).attr("client_id");
            console.log(id_client_f);
            $.post(
              "./controller/delete_client.php",
              { id_client_f },
              function (response) {
                list_Client();
              }
            );
          } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
          ) {
            swalWithBootstrapButtons.fire(
              "Cancelado",
              "Operación cancelada.",
              "error"
            );
          }
        });
    });
  }

  function edit_client() {
    $(document).on("click", ".client-edit", function () {
      let element = $(this)[0].parentElement.parentElement;
      let id_client_f = $(element).attr("client_id");
      console.log(id_client_f);
      $.post(
        "./controller/get_infoclient.php",
        { id_client_f },
        function (response) {
          let clientsObject = JSON.parse(response);
          console.log(clientsObject)
        }
      );
 
    });
  }
});
