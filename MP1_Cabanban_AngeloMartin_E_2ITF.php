<?php 
extract($_POST);
if(isset($submit))
{
    $annTax = 0;
    $annSal = 0;
    
	switch($_POST['type']) {

		case 'Bi-Monthly':
		$annSal = $salary * 24;
		break;
		
		case 'Monthly':
		$annSal = $salary * 12;
		break;
	}

    if ($annSal > 8000000) {
        $annTax = 2410000 + ($annSal - 8000000) * 0.35;
      }
      
      else if ($annSal > 2000000) {
        $annTax = 490000 + ($annSal - 2000000) * 0.32;
      } 
      
      else if ($annSal > 800000) {
        $annTax = 130000 + ($annSal - 800000) * 0.3;
      } 
      
      else if ($annSal > 400000) {
        $annTax = 30000 + ($annSal - 400000) * 0.25;
      } 
      
      else if ($annSal > 250000) {
        $annTax = ($annSal - 250000) * 0.2;
      }

  $monthlyTax = $annTax / 12;
}

?>
<!DOCTYPE html>
    <head>
        <meta charset=utf-8 />
        <link href="MP1_Cabanban.css" rel="Stylesheet" type="text/css"/>
        <title>2ITF_CABANBAN Salary Tax Calculator</title>
    </head>
    <body>

        <center>
                <p><marquee  width="100%" direction="left" scrollamount="18"><img src="love.png" alt="We Love Losing Money!" id="love"><img src="gov.png" alt="Pay the Government!" id="gov"><img src="calc.png" alt="Calculate Your Taxes Now!"></marquee></p>
            
                <p> <strong>The Philippine Tax Calculator</strong> <br> See how much Money You Lose! </p>
                
            <div>
                    <form action="" method="POST">
                        <label for="salary">Salary: &nbsp; PHP</label>
                        <input type="number" name="salary" id="salary" value="<?php  echo @$salary;?>"/><br><br>
                        
                        <label for="type">Type: &nbsp;</label>
                        <input type="radio" name="type" id="bimon" value="Bi-Monthly"> Bi-Monthly &nbsp;
                        <input type="radio" name="type" id="mon" value="Monthly"> Monthly
                        
                        <br><br>
                        <input type="submit" value="Deduct!" id="butcom" name="submit"> <br>
                    </form>

                    <fieldset id="results">
                    <p> Results: </p>
                    <div>
                        <p>Annual Salary (PHP): <input type="number" readonly="readonly" disabled="disabled" value="<?php  echo @$annSal;?>"/></p>
                        <p>Est. Annual Tax (PHP): <input type="number" readonly="readonly" disabled="disabled" value="<?php  echo @$annTax;?>"/></p>
                        <p>Est. Monthly Tax (PHP): <input type="number" readonly="readonly" disabled="disabled" value="<?php  echo @$monthlyTax;?>"/></p>
                    </div>
                    </fieldset>
            </div> 
        </center>
        <marquee width="99%" direction="right" scrollamount="45"><img src="flash.gif" id="flash"></marquee>
    </body>
</html>