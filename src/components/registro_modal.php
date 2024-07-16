<div class="modal fade" id="registroModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form class="modal-content" action="index.php" method="post">
        <div class="modal-header">
          <h1 class="modal-title fs-5 text-center fs-5 fw-bold text-purple" id="exampleModalLabel">Inscripcion para Aspirante</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-2">
            <label for="floatingInput">Nombre</label>
            <input type="text" class="form-control" name="name_reg" required placeholder="Escribe tu nombre completo">
          </div>
          <div class="mb-2">
            <label for="floatingInput">Correo Electronico</label>
            <input type="email" class="form-control" name="email_reg" required placeholder="name@example.com">
          </div>


          <div class="mb-3">
            <label for="floatingInput">Correo Electronico</label>
            <div class="input-group mb-3">
              <span class="input-group-text">Municipio</span>
              <input type="text" class="form-control" aria-label="minucipio">
              <span class="input-group-text">Calle</span>
              <input type="text" class="form-control" aria-label="Calle">
              <span class="input-group-text">No.</span>
              <input type="number" class="form-control" aria-label="numero">
            </div>
          </div>
          
          <div class="mb-2">
            <label for="floatingInput">No. Celular</label>
            <input type="email" class="form-control" name="email_reg" required placeholder="0000 - 0000 - 00">
          </div>

          <div class="mb-3">
          <label for="basic-url" class="form-label">Elige una carrera </label>
          <select class="form-select mb-3" aria-label="Default select example" required name="user_type_reg">
          
          <?php
            $sqlCarrer = "SELECT * FROM `carrer`";
            $res = mysqli_query($conn, $sqlCarrer);
            foreach( $res as $row ){ 
          ?>
            <option value=" <?php  echo $row['id'] ?> "> <?php  echo $row['carrera'] ?> </option>
          <?php
            }
          ?>

          </select>
          </div>


        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn bg-purple" name="btn-register">Registrar</button>
        </div>

      </form>
    </div>
  </div>