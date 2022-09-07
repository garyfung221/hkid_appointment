
<?php
//Set the timezone in Hong Kong
date_default_timezone_set('Asia/Hong_Kong');

include "calendar_calculatequota_process.php";
?>


<h1>Appointment Calendar</h1>
   
   <strong><h5><?php echo "CURRENT DATE : " .date("l "). date("Y-m-d") . "<br>"; ?></h5></strong>
   <br>
   The representative colours meaning :
   <br>
   <br>
   Current day number : <span style="color:grey">Grey</span>
   <br>Full: <span style="color:red">Red</span> 
   <br>
   Remaining not many quotas: <span style="color:orange">Orange</span> 
   <br>
   Enough available: <span style="color:#1abc9c">Green</span>
   <br>
   <br>
   <div class="month">      
<ul>

 <li>
   September<br>
   <span style="font-size:18px">2022</span>
   
 </li>
</ul>
</div>

<ul class="weekdays">
<li>Mo</li>
<li>Tu</li>
<li>We</li>
<li>Th</li>
<li>Fr</li>
<li>Sa</li>
<li>Su</li>
</ul>

<ul class="days">  
<li>1</li>
<li>2</li>
<li>3</li>
<li>4</li>
<li>5</li>
<li>6</li>
<li><span class="active">7</span></li>
<li><span class="<?php echo calquotas("8");?>">8</span></li>
<li><span class="<?php echo calquotas("9");?>">9</span></li>
<li><span class="<?php echo calquotas("10");?>">10</span></li>
<li><span class="<?php echo calquotas("11");?>">11</span></li>
<li><span class="<?php echo calquotas("12");?>">12</span></li>
<li><span class="<?php echo calquotas("13");?>">13</span></li>
<li>14</li>
<li>15</li>
<li>16</li>
<li>17</li>
<li>18</li>
<li>19</li>
<li>20</li>
<li>21</li>
<li>22</li>
<li>23</li>
<li>24</li>
<li>25</li>
<li>26</li>
<li>27</li>
<li>28</li>
<li>29</li>
<li>30</li>
</ul>

<br>