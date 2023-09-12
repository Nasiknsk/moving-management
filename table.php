<html>
<style>
       table {
  border-collapse: collapse;
  width: 80%;
  margin-left: 220px;
  margin-right: 50px;
  font-size: 1em;
  font-family: Arial, sans-serif;
  color: #333;
}

th {
  background-color: silver;
  color: black;
  font-weight: bold;
  padding:5px;
  text-align: left;
  text-transform: uppercase;
}

td {
  border: 1px solid #ccc;
  padding: 10px;
}

tr:nth-child(even) {
  background-color: #f2f2f2;
}

tr:hover {
  background-color: #e6f7ff;
  cursor: pointer;
}

/* Button styles */

button {
  background-color: #1abc9c;
  color: #fff;
  border: none;
  border-radius: 3px;
  padding: 10px 20px;
  font-size: 1em;
  font-weight: bold;
  text-transform: uppercase;
  cursor: pointer;
}

button:hover {
  background-color: #148f77;
}
    </style>
     <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>

</html>