<form action="addbook.php" method ="post" >
  Author:<input type="text" name="author"><br>
  Title: <input type="text" name="title"><br>
  No. Of Pages:<input type="number" name="booklength"><br>
  Status:<select name="bookstatus">
        <option value="in">In Library</option>
        <option value="out">On Loan</option>
    </select>
  
  <br>
  Genre:<select name="genre">
        <option value="mystery">Mystery</option>
        <option value="action">Action</option>
    </select><br>
  <!-- Add genres table to pick from -->
  Today's Date:<input type="text" name="dateadded"><br>
  <!--Creates a drop down list-->
  <br>

  <input type="submit" value="Add Book">
</form>
