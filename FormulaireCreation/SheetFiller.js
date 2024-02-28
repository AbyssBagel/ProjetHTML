    document.querySelector("#fillButton").addEventListener("click", function() {
        
		  console.log("test");
      fill(FeuillePersoDD5.pdf);

    });

    function make_pdfform() {
      var lib_name = document.querySelector('input[name="pdflib"]:checked').value;
      return pdfform((lib_name === 'minipdf') ? minipdf : minipdf_js);
    }

    function fill(buf) {
      var list_form = document.querySelector('.list_form');
      var fields = {};
      list_form.querySelectorAll('input,select').forEach(function(input) {
        if ((input.getAttribute('type') === 'radio') && !input.checked) {
          return;
        }
    
        var key = input.getAttribute('data-key');
        if (!fields[key]) {
          fields[key] = [];
        }
        var index = parseInt(input.getAttribute('data-idx'), 10);
        var value = (input.getAttribute('type') === 'checkbox') ? input.checked : input.value;
        fields[key][index] = value;
      });
    
      var filled_pdf; // Uint8Array
      try {
        filled_pdf = make_pdfform().transform(buf, fields);
      } catch (e) {
        return on_error(e);
      }
    
      var blob = new Blob([filled_pdf], {type: 'application/pdf'});
      saveAs(blob, 'FichePersoRemplie.pdf');
    }