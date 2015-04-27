		
		function test() {

	    var table = document.getElementById("mstrTable");
	    var thead = table.getElementsByTagName("thead");
	    var tbody = table.getElementsByTagName("tbody");
	    var tdata = table.getElementsByTagName("td");
	    var ishigh;

	    document.onclick = function (e) {
	        e = e || window.event;
	        var td = e.target || e.srcElement
	        var row = td.parentNode;
	        var newhigh;
	        if (ishigh && ishigh != row) {
	        	newhigh = rowindex(ishigh);
	            ishigh.className = '';
	            return GoTo('mstrTable', newhigh);
	        }
	        row.className = row.className === "highlighted";
	        ishigh = row;
	        
	        populateFields(row);
	    }

	    function GoTo(id, nu) {
	        var obj = document.getElementById('#id'),
	            trs = obj.getElementsByTagName('TR');
	        nu = nu + 1;
	        if (trs[nu]) {
	            if (ishigh && ishigh != trs[nu]) {
	                ishigh.className = '';
	            }
	            trs[nu].className = trs[nu].className == "highlighted" ? "" : "highlighted";
	            ishigh = trs[nu];
	        }
	        
	        populateFields(trs[nu]);
	    }

	    function rowindex(row) {
	        var rows = table.rows,
	            i = rows.length;
	        while (--i > -1) {
	            if (rows[i] === row) {
	                return i;
	            }
	        }
	    }
	    
	    function tabpop(id) {
	        return document.getElementById(id);
	    }
	    
	    function populateFields(row) {
	    	tabpop('id').value = row.cells[0].innerHTML.trim();	
	        tabpop('item').value = row.cells[1].innerHTML.trim();
	        tabpop('price').value = row.cells[2].innerHTML.trim();
	        tabpop('date').value = row.cells[3].innerHTML.trim();
	        tabpop('location').value = row.cells[4].innerHTML.trim();
	        tabpop('category').value = row.cells[5].innerHTML.trim();
	        tabpop('duration').value = row.cells[6].innerHTML.trim();
	        tabpop('image').value = row.cells[7].innerHTML.trim();
	        tabpop('contactInfo').value = row.cells[8].innerHTML.trim();
	        tabpop('description').value = row.cells[9].innerHTML.trim();
	    }

	  }