
<!-- MODAL ADD CATEGORY  -->
<div class="modal fade" id="addCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add a new category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <select class="custom-select" id="typeCat" placeholder="Type" style="font-weight: bold;">
                <option  style="font-weight: bold;">Income</option>
                <option  style="font-weight: bold;">Expenses</option>
                <option  style="font-weight: bold;">Savings</option>
              </select>
          </div>
          <div class="form-group">
            <th class="col-4"><input type="text" maxlength="75" class="form-control" placeholder="Category name" id="nameCat"></th>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success" data-dismiss="modal" id="addCat">Add</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="delCatConfirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Do you really want to delete the category and all data related to it ? (budget entries, transactions, savings, projects)</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger" id="delCat">DELETE</button>
      </div>
    </div>
  </div>
</div>


<div class="marge" id="message"></div>
  <div class="row" style="margin-top: 1%; margin-left: 3%;">
    <div class="col-3" style="background-color: white; border-radius: 5px; padding: 1%;">
      <h3>Categories <button style="float: right;" data-toggle="modal" data-target="#addCategory" class="btn btn-success">+</button></h3>
      <br>
      <h5 style="text-align: center;">Income</h5>
      <table class="table">
        <tbody class="table-group-divider table-divider-color" id="listIncome">
          
        </tbody>
      </table>
      <br>
      <h5 style="text-align: center;">Expenses</h5>
      <table class="table">
        <tbody class="table-group-divider table-divider-color" id="listExpenses">
          
        </tbody>
      </table>
        
      </ul>
      <br>
      <h5 style="text-align: center;">Savings</h5>
      <table class="table">
        <tbody class="table-group-divider table-divider-color" id="listSavings">
          
        </tbody>
      </table>

      </ul>
    </div>
    <div class="col-5" style="background-color: white; border-radius: 5px; padding: 1%; margin-left: 1%;">
      <div style="background-color: white; padding: 1%; border-radius: 5px;">
        <h3>Payments <button style="float: right;" class="btn btn-success">+</button></h3>
      <br>
      <br>
      <table class="table">
        <tbody class="table-group-divider table-divider-color">
          <tr>
            <th scope="row">Apple iCloud+</th>
            <td>Expenses</td>
            <td>Medias</td>
            <td>10</td>
            <td>
              <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="cs2">
                  <label class="custom-control-label" for="cs2"><input class="custom-input" min=0 max=31 type="number" disabled></label>
                  <button class="btn btn-outline-secondary btn-sm" style="border: 0; float: right;">📝</button>
                  <button class="btn btn-outline-secondary btn-sm" style="border: 0; float: right;">❌</button>
                </div>
            </td>
          </tr>
          <tr>
            <th scope="row">Spotify</th>
            <td>Expenses</td>
            <td>Medias</td>
            <td>19</td>
            <td>
              <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="cs2">
                  <label class="custom-control-label" for="cs2"><input class="custom-input" min=0 max=31 type="number" disabled></label>
                  <button class="btn btn-outline-secondary btn-sm" style="border: 0; float: right;">📝</button>
                  <button class="btn btn-outline-secondary btn-sm" style="border: 0; float: right;">❌</button>
                </div>
            </td>
          </tr>
          <tr>
            <th scope="row">Accomptes</th>
            <td>Savings</td>
            <td>Impôts</td>
            <td>715</td>
            <td>
              <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="cs2">
                  <label class="custom-control-label" for="cs2"><input class="custom-input" min=0 max=31 type="number" disabled></label>
                  <button class="btn btn-outline-secondary btn-sm" style="border: 0; float: right;">📝</button>
                  <button class="btn btn-outline-secondary btn-sm" style="border: 0; float: right;">❌</button>
                </div>
            </td>
          </tr>
        </tbody>
      </table>
      </div>
      
    </div>
    <div class="col-3"></div>
  </div>
  <script>

    function changeOrderCategory(idCategory, direction){
      $.ajax({
         url: 'model/changeOrderCategory.php',
         data: {idCategory: idCategory, direction: direction},
         success: function(data) {
           let clearData = JSON.parse(data);
           if (clearData) {
             displayCategories();
           }
           else {
             showMessage("sfasdfasdfasdf", "danger");
           }
         },
         type: 'POST'
        });
    }

    function deleteCategory(idCategory){
      $.ajax({
         url: 'model/delCategory.php',
         data: {idCat: idCategory},
         success: function(data) {
           let clearData = JSON.parse(data);
           if (clearData) {
             $('#delCatConfirm').modal('toggle');
             displayCategories();
             showMessage("Categorie suprrimée", "success");
           }
           else {
             showMessage("La categorie n'a pas été supprimée", "danger");
           }
         },
         type: 'POST'
        });
    }

    function showMessage(message, type){
      $('#message').empty();
      $('#message').append(""+
        "<div class=\"alert alert-"+type+"\" role=\"alert\">"+
          message+
        "</div>"
      );
      setTimeout(function() {
          $('#message').empty();
      }, 5000);
      
      
    }

    function displayCategories() {
      $('#listIncome').empty();
      $('#listExpenses').empty();
      $('#listSavings').empty();
      $.ajax({
        url: 'model/getCategories.php',
        success: function(data) {
          let clearData = JSON.parse(data);
          if (clearData.length == 0) {
            
          }
          else {
          let nbI = [];
          let nbE = [];
          let nbS = [];
          clearData.forEach(function (item) {
            if (item[2] == "Income") {
              nbI.push(item[0]);
            }
            else if (item[2] == "Expenses") {
              nbE.push(item[0]);
            }
            else {
              nbS.push(item[0]);
            }
          });
          console.log(nbI);
          console.log(nbE);
          console.log(nbS);
          clearData.forEach(function (item) {
            let catList = ""+
                "<tr>"+
                  "<th scope=\"row\">"+item[1]+"</th>"+
                  "<td>"+
                    "<div class=\"custom-control\">"+
                      "<button class=\"btn btn-outline-secondary btn-sm\" data-toggle=\"modal\" data-target=\"#delCatConfirm\" data-whatever=\""+item[0]+"\" style=\"border: 0; float: right;\">❌</button>"+
                      "<button class=\"btn btn-outline-secondary btn-sm\" style=\"border: 0; float: right;\">📝</button>"+
                      ((item[0] == nbI[0] || item[0] == nbE[0] || item[0] == nbS[0])?"":"<button class=\"btn btn-outline-secondary btn-sm\" onclick=\"changeOrderCategory("+item[0]+", 0)\" style=\"border: 0; float: right;\">▲</button>")+
                      ((item[0] == nbI[nbI.length-1] || item[nbE.length-1] == nbE[0] || item[nbS.length-1] == nbS[0])?"":"<button class=\"btn btn-outline-secondary btn-sm\" onclick=\"changeOrderCategory("+item[0]+", 1)\" style=\"border: 0; float: right;\">▼</button>")+
                      "</div>"+
                  "</td>"+
                "</tr>";

            if (item[2] == "Income") {
              $('#listIncome').append(catList);
            }
            else if (item[2] == "Expenses") {
              $('#listExpenses').append(catList);
            }
            else {
              $('#listSavings').append(catList);
            }
            
        });
      }
        },
        type: 'GET'
      });
    }

    $('#delCatConfirm').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var recipient = button.data('whatever') // Extract info from data-* attributes
      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
      var modal = $(this)
      modal.find("#delCat").attr("onclick","deleteCategory("+recipient+")");
      
    })


    $(document).ready(function(){

      displayCategories();

      //Add a Category
      $("#addCat").click(function(){
        $.ajax({
         url: 'model/addCategory.php',
         data: {nameCat: $("#nameCat").val(), typeCat: $("#typeCat").val()},
         success: function(data) {
           let clearData = JSON.parse(data);
           if (clearData) {
             displayCategories();
             showMessage("Catégorie ajoutée", "success");
           }
           else {
             alert("ERROR: La categorie n'a pas été ajoutée");
           }
         },
         type: 'GET'
        });
      });
    });
  </script>
  </body>
</html>
