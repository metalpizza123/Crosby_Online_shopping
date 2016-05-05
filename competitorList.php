<!DOCTYPE html>
<html>
    <body>
        <form method="post" action="#">
            <select name="house" onclick="pi(this.value)">
                <option selected disabled>house:</option>
                <option value="Bramston">Bramston</option>
                <option value="Crosby">Crosby</option>
                <option value="Dryden">Dryden</option>
                <option value="Fisher">Fisher</option>
                <option value="Grafton">Grafton</option>
                <option value="Kirkeby">Kirkeby</option>
                <option value="Laundimer">Laundimer</option>
                <option value="Laxton">Laxton</option>
                <option value="New House">New House</option>
                <option value="Sanderson">Sanderson</option>
                <option value="School House">School House</option>
                <option value="Sidney">Sidney</option>
                <option value="St Anthony">St Anthony</option>
                <option value="Wyatt">Wyatt</option>
            </select>
        </form>
        
        <p id="1">ihjnlkm</p>
        
        <script>
        function pi(house){
        document.getElementById(1).innerHTML = house}
        </script>
        
        <?php
        if (isset($_POST[house])) {
            $db = new PDO("mysql:host=Localhost; dbname=SportsDay",'root','raspberry');
            $query = $db->prepare("SELECT `name` FROM `Competitors` WHERE `house` = 'Bramston'");
            $query->execute();
            echo ("<hr>");
            while($data = $query->fetch(PDO::FETCH_ASSOC)){
                print_r($data);
                echo("<br>");
                }
            echo ("<hr>");
        }
        ?>
        
    </body>
</html>