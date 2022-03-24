<!-- <!DOCTYPE html>

<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Bootstrap Datatable | Webdevtrick.com</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/css/dataTables.bootstrap.min.css'>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,500" rel="stylesheet"/>
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
  <style>

table {
  width: 100%;
  border-collapse: collapse;
}



td,
th {
  padding: 10px;
  border: 1px solid #ccc;
  text-align: left;
}


@media only screen and (max-width: 760px),
(min-device-width: 768px) and (max-device-width: 1024px) {

  /*  */

 
  .responsive td:before {
    content: attr(data-table-header) !important;
  }
}
  </style>
</head>

<body>


<div class="row">
<div class="container"> 
  
  <h1>Bootstrap 3 SortTable</h1> 
  <table class="table responsive" id="sort">
	<thead>
		<tr>
			<th scope="col">Title</th>
			<th scope="col">Authors</th>
			<th scope="col">Journal</th>
			<th scope="col">Date</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td data-table-header="Title">Parent Adolescent Relationship Factors and Adolescent Outcomes Among High-Risk Families.</td>
			<td data-table-header="Authors">Matthew Withers, Lenore McWey, Mallory Lucier-Greer</td>
			<td data-table-header="Journal">Family Relations</td>
			<td data-table-header="Date">Jan. 2017</td>
		</tr>
		<tr>
			<td data-table-header="Title">Prescription Drugs and Nutrient Depletion: How Much is Known?</td>
			<td data-table-header="Authors">Wendimere Reilly, Jasminka Ilich</td>
			<td data-table-header="Journal">Advances in Nutrition: An International Review Journal</td>
			<td data-table-header="Date">Jan. 2017</td>
		</tr>
		<tr>
			<td data-table-header="Title">Relation of Adiponectin with Body Adiposity and Bone Mineral Density in Older Women.</td>
			<td data-table-header="Authors">Pegah Jafari Nasabian, Julia Inglis, Miranda Ave, Hayley Hebrock, Katie Hall, Sara Nieto, Jasminka Ilich</td>
			<td data-table-header="Journal">Advances in Nutrition: An International Review Journal</td>
			<td data-table-header="Date">Jan. 2017</td>
		</tr>
		<tr>
			<td data-table-header="Title">Benefits of whole-body vibration training on arterial function and muscle strength in young overweight/obese women.</td>
			<td data-table-header="Authors">Alvarez-Alvarado S, Jaime SJ, Ormsbee MJ, Campbell JC, Post J, Pacilio J, Figueroa A.</td>
			<td data-table-header="Journal">Hypertension Research International Journal</td>
			<td data-table-header="Date">Jan. 2017</td>
		</tr>
		<tr>
			<td data-table-header="Title">Overexpression of PGC-1α Increases Peroxisomal and Mitochondrial Fatty Acid Oxidation in Human Primary Myotubes.</td>
			<td data-table-header="Authors">Huang TY, Zheng D, Houmard JA, Brault JJ, Hickner RC, Cortright RN.</td>
			<td data-table-header="Journal">American Journal of Physiology: Endocrinology and Metabolism</td>
			<td data-table-header="Date">Jan. 2017</td>
		</tr>
		<tr>
			<td data-table-header="Title">Observed Parenting in Families exposed to Homelessness: Child and Parent Characteristics as Predictors of Response to the Early Risers Intervention.</td>
			<td data-table-header="Authors">Kendal Holtrop, Timothy F. Piehler, Abigail H. Gewirtz, Gerald J. August</td>
			<td data-table-header="Journal">Child and Family Well-Beging and Homelessness:&nbsp;Integrating&nbsp;Research into Practice and Policy</td>
			<td data-table-header="Date">Feb. 2017</td>
		</tr>
		<tr>
			<td data-table-header="Title">Testing the impact of sliding versus deciding in cyclical and non cyclical relationships.</td>
			<td data-table-header="Authors">Charity E. Clifford, Amber Vennum, Michelle Busk, Frank D. Fincham</td>
			<td data-table-header="Journal">Personal Relationships:&nbsp;Journal of the International Assoc. for Relationship Research</td>
			<td data-table-header="Date">Feb. 2017</td>
		</tr>
		<tr>
			<td data-table-header="Title">Personal and Cultural Identity Development in Recently Immigrated Hispanic Adolescents: Links With Psychosocial Functioning.</td>
			<td data-table-header="Authors">Meca A, Sabet RF, Farrelly CM, Benitez CG, Schwartz SJ,&nbsp;Gonzales-Backen M, Lorenzo-Blanco EI, Unger JB, Zamboanga BL, Baezconde-Garbanati L, Picariello S, Des Rosiers SE, Soto DW, Pattarroyo M, Villamar JA, Lizzi KM. </td>
			<td data-table-header="Journal">American Psychological Association: Cultural Diversity &amp; Ethnic Minority Psychology</td>
			<td data-table-header="Date">Feb. 2017</td>
		</tr>
		<tr>
			<td data-table-header="Title">School burnout and intimate partner violence: The role of self-control.</td>
			<td data-table-header="Authors">AN Cooper, GS Seibert, RW May, MC Fitzgerald, FD Fincham</td>
			<td data-table-header="Journal">Personality and Individual Differences</td>
			<td data-table-header="Date">Feb. 2017</td>
		</tr>
		<tr>
			<td data-table-header="Title">Efficacy Of The Repetitions In Reserve-Based Rating Of Perceived Exertion For The Bench Press In Experienced And Novice Benchers.</td>
			<td data-table-header="Authors">Ormsbee MJ, Carzoli JP, Klemp A, Allman BR, Zourdos MC, Kim JS, Panton LB.</td>
			<td data-table-header="Journal">The Journal of Strength and Conditioning Research</td>
			<td data-table-header="Date">March 2017</td>
		</tr>
		<tr>
			<td data-table-header="Title">Exercise training reverses age-induced diastolic dysfunction and restores coronary microvascular function.</td>
			<td data-table-header="Authors">Hotta K, Chen B, Behnke BJ, Ghosh P, Stabley JN, Bramy JA, Sepulveda JL, Delp MD, Muller-Delp JM.</td>
			<td data-table-header="Journal">The Journal of Physiology</td>
			<td data-table-header="Date">March 2017</td>
		</tr>
		<tr>
			<td data-table-header="Title">Macronutrient Intake and Distribution in the Etiology, Prevention and Treatment of Osteosarcopenic Obesity.</td>
			<td data-table-header="Authors">Kelly OJ, Gilman JC, Kim Y, Ilich JZ.</td>
			<td data-table-header="Journal">Current Aging Science</td>
			<td data-table-header="Date">May 2017</td>
		</tr>
		<tr>
			<td data-table-header="Title">Perception in Romantic Relationships: a Latent Profile Analysis of Trait Mindfulness in Relation to Attachment and Attributions.</td>
			<td data-table-header="Authors">JG Kimmes, JA Durtschi, FD Fincham.</td>
			<td data-table-header="Journal">Mindfulness</td>
			<td data-table-header="Date">April 2017</td>
		</tr>
		<tr>
			<td data-table-header="Title">Individual Differences in Adolescents’ Emotional Reactivity across Relationship Contexts.</td>
			<td data-table-header="Authors">Cook EC, Blair BL, Buehler C.</td>
			<td data-table-header="Journal">Journal of Youth Adolescence</td>
			<td data-table-header="Date">April 2017</td>
		</tr>
		<tr>
			<td data-table-header="Title">Is Plus Size Equal? The Positive Impacts of Average and Plus Sized Media Fashion Models on Women’s Cognitive Resource Allocation, Social Comparisons, and Body Satisfaction. [in press]</td>
			<td data-table-header="Authors">RB Clayton, JL Ridgway, J Hendrickse.</td>
			<td data-table-header="Journal">Communication Monographs</td>
			<td data-table-header="Date">April 2017</td>
		</tr>
		<tr>
			<td data-table-header="Title">Effects of Tart Cherry Juice on Brachial and Aortic Hemodynamics, Arterial Stiffness, and Blood Biomarkers of Cardiovascular Health in Adults with Metabolic Syndrome.</td>
			<td data-table-header="Authors">Sarah Johnson, Negin Navaei, Shirin Pourafshar, Salvador Jaime, Neda Akhavan, Stacey Alvarez-Alvarado, Nicole Litwin, Marcus Elam, Mark Payton, Bahram Arjmandi, Arturo Figueroa.</td>
			<td data-table-header="Journal">Journal of Federation of American Societies for Experimental Biology</td>
			<td data-table-header="Date">April 2017</td>
		</tr>
		<tr>
			<td data-table-header="Title">Parenting Styles and College Enrollment: A Path Analysis of Risky Human Capital Decisions.</td>
			<td data-table-header="Authors">J Kimmes, S Heckman</td>
			<td data-table-header="Journal">Journal of Family and Economic Issues</td>
			<td data-table-header="Date">May 2017</td>
		</tr>
		<tr>
			<td data-table-header="Title">Emerging Adult Relationship Transitions as Opportune Times for Tailored Interventions.</td>
			<td data-table-header="Authors">A Vennum, JK Monk, BK Pasley, FD Fincham</td>
			<td data-table-header="Journal">Emerging Adulthood</td>
			<td data-table-header="Date">May 2017</td>
		</tr>
		<tr>
			<td data-table-header="Title">Watermelon and L-Arginine Consumption Regulate Gene Expression Related to Serum Lipid Profile, Inflammation, and Oxidative Stress in Rats Fed on Atherogenic Diet.</td>
			<td data-table-header="Authors">Joshua Beidler, Shirin Hooshmand, Mark Kern, Arturo Figueroa, Men Young Hong</td>
			<td data-table-header="Journal">Journal of Federation of American Societies for Experimental Biology</td>
			<td data-table-header="Date">April 2017</td>
		</tr>
		<tr>
			<td data-table-header="Title">Contribution of Adiponectin to Vascular Responses in Bone Resistance Arteries in Mice.</td>
			<td data-table-header="Authors">Payal Ghosh, Kazuki Hotta, Tiffany Lucero, Kyle Borodunovich, Morgan Cowan, Jeremy Bramy, Bradley Behnke, Michael Delp, Judy Delp</td>
			<td data-table-header="Journal">Journal of Federation of American Societies for Experimental Biology</td>
			<td data-table-header="Date">April 2017</td>
		</tr>
		<tr>
			<td data-table-header="Title">Bone-Protective Effects of Dried Plum in Postmenopausal Women: Efficacy and Possible Mechanisms.</td>
			<td data-table-header="Authors">Arjmani BH, Johnson SA, Pourafshar S, Navaei N, George KS, Hooshmand S, Chai SC, Akhavan NS</td>
			<td data-table-header="Journal">Nutrients</td>
			<td data-table-header="Date">May 2017</td>
		</tr>
		<tr>
			<td data-table-header="Title">Cardiovascular Responses to Unilateral, Bilateral, and Alternating Limb Resistance Exercise Performed Using Different Body Sements.</td>
			<td data-table-header="Authors">Moreira OC, Faraci LL, de Matos DG, Mazini Filho ML, da Silva SF, Aidar FJ, Hickner RC, de Oliveira CE</td>
			<td data-table-header="Journal">Journal of Strength and Conditioning Research</td>
			<td data-table-header="Date">March 2017</td>
		</tr>
	</tbody>
</table>
</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/js/dataTables.bootstrap.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.0/moment.min.js'></script>
<script >
$(document).ready(function() {
   $("#sort").DataTable({
      columnDefs : [
    { type : 'date', targets : [3] }
],  
   });
});
</script>

</body>
</html> -->


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

	<style >
		table.dataTable thead .sorting:after,
table.dataTable thead .sorting:before,
table.dataTable thead .sorting_asc:after,
table.dataTable thead .sorting_asc:before,
table.dataTable thead .sorting_asc_disabled:after,
table.dataTable thead .sorting_asc_disabled:before,
table.dataTable thead .sorting_desc:after,
table.dataTable thead .sorting_desc:before,
table.dataTable thead .sorting_desc_disabled:after,
table.dataTable thead .sorting_desc_disabled:before {
  bottom: .5em;
}
	</style>
</head>
<body>
	<table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th class="th-sm">Name
      </th>
      <th class="th-sm">Position
      </th>
      <th class="th-sm">Office
      </th>
      <th class="th-sm">Age
      </th>
      <th class="th-sm">Start date
      </th>
      <th class="th-sm">Salary
      </th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Tiger Nixon</td>
      <td>System Architect</td>
      <td>Edinburgh</td>
      <td>61</td>
      <td>2011/04/25</td>
      <td>$320,800</td>
    </tr>
    <tr>
      <td>Garrett Winters</td>
      <td>Accountant</td>
      <td>Tokyo</td>
      <td>63</td>
      <td>2011/07/25</td>
      <td>$170,750</td>
    </tr>
    <tr>
      <td>Ashton Cox</td>
      <td>Junior Technical Author</td>
      <td>San Francisco</td>
      <td>66</td>
      <td>2009/01/12</td>
      <td>$86,000</td>
    </tr>
    <tr>
      <td>Cedric Kelly</td>
      <td>Senior Javascript Developer</td>
      <td>Edinburgh</td>
      <td>22</td>
      <td>2012/03/29</td>
      <td>$433,060</td>
    </tr>
    <tr>
      <td>Airi Satou</td>
      <td>Accountant</td>
      <td>Tokyo</td>
      <td>33</td>
      <td>2008/11/28</td>
      <td>$162,700</td>
    </tr>
    <tr>
      <td>Brielle Williamson</td>
      <td>Integration Specialist</td>
      <td>New York</td>
      <td>61</td>
      <td>2012/12/02</td>
      <td>$372,000</td>
    </tr>
    <tr>
      <td>Herrod Chandler</td>
      <td>Sales Assistant</td>
      <td>San Francisco</td>
      <td>59</td>
      <td>2012/08/06</td>
      <td>$137,500</td>
    </tr>
    <tr>
      <td>Rhona Davidson</td>
      <td>Integration Specialist</td>
      <td>Tokyo</td>
      <td>55</td>
      <td>2010/10/14</td>
      <td>$327,900</td>
    </tr>
    <tr>
      <td>Colleen Hurst</td>
      <td>Javascript Developer</td>
      <td>San Francisco</td>
      <td>39</td>
      <td>2009/09/15</td>
      <td>$205,500</td>
    </tr>
    <tr>
      <td>Sonya Frost</td>
      <td>Software Engineer</td>
      <td>Edinburgh</td>
      <td>23</td>
      <td>2008/12/13</td>
      <td>$103,600</td>
    </tr>
    <tr>
      <td>Jena Gaines</td>
      <td>Office Manager</td>
      <td>London</td>
      <td>30</td>
      <td>2008/12/19</td>
      <td>$90,560</td>
    </tr>
    <tr>
      <td>Quinn Flynn</td>
      <td>Support Lead</td>
      <td>Edinburgh</td>
      <td>22</td>
      <td>2013/03/03</td>
      <td>$342,000</td>
    </tr>
    <tr>
      <td>Charde Marshall</td>
      <td>Regional Director</td>
      <td>San Francisco</td>
      <td>36</td>
      <td>2008/10/16</td>
      <td>$470,600</td>
    </tr>
    <tr>
      <td>Haley Kennedy</td>
      <td>Senior Marketing Designer</td>
      <td>London</td>
      <td>43</td>
      <td>2012/12/18</td>
      <td>$313,500</td>
    </tr>
    <tr>
      <td>Tatyana Fitzpatrick</td>
      <td>Regional Director</td>
      <td>London</td>
      <td>19</td>
      <td>2010/03/17</td>
      <td>$385,750</td>
    </tr>
    <tr>
      <td>Michael Silva</td>
      <td>Marketing Designer</td>
      <td>London</td>
      <td>66</td>
      <td>2012/11/27</td>
      <td>$198,500</td>
    </tr>
    <tr>
      <td>Paul Byrd</td>
      <td>Chief Financial Officer (CFO)</td>
      <td>New York</td>
      <td>64</td>
      <td>2010/06/09</td>
      <td>$725,000</td>
    </tr>
    <tr>
      <td>Gloria Little</td>
      <td>Systems Administrator</td>
      <td>New York</td>
      <td>59</td>
      <td>2009/04/10</td>
      <td>$237,500</td>
    </tr>
    <tr>
      <td>Bradley Greer</td>
      <td>Software Engineer</td>
      <td>London</td>
      <td>41</td>
      <td>2012/10/13</td>
      <td>$132,000</td>
    </tr>
    <tr>
      <td>Dai Rios</td>
      <td>Personnel Lead</td>
      <td>Edinburgh</td>
      <td>35</td>
      <td>2012/09/26</td>
      <td>$217,500</td>
    </tr>
    <tr>
      <td>Jenette Caldwell</td>
      <td>Development Lead</td>
      <td>New York</td>
      <td>30</td>
      <td>2011/09/03</td>
      <td>$345,000</td>
    </tr>
    <tr>
      <td>Yuri Berry</td>
      <td>Chief Marketing Officer (CMO)</td>
      <td>New York</td>
      <td>40</td>
      <td>2009/06/25</td>
      <td>$675,000</td>
    </tr>
    <tr>
      <td>Caesar Vance</td>
      <td>Pre-Sales Support</td>
      <td>New York</td>
      <td>21</td>
      <td>2011/12/12</td>
      <td>$106,450</td>
    </tr>
    <tr>
      <td>Doris Wilder</td>
      <td>Sales Assistant</td>
      <td>Sidney</td>
      <td>23</td>
      <td>2010/09/20</td>
      <td>$85,600</td>
    </tr>
    <tr>
      <td>Angelica Ramos</td>
      <td>Chief Executive Officer (CEO)</td>
      <td>London</td>
      <td>47</td>
      <td>2009/10/09</td>
      <td>$1,200,000</td>
    </tr>
    <tr>
      <td>Gavin Joyce</td>
      <td>Developer</td>
      <td>Edinburgh</td>
      <td>42</td>
      <td>2010/12/22</td>
      <td>$92,575</td>
    </tr>
    <tr>
      <td>Jennifer Chang</td>
      <td>Regional Director</td>
      <td>Singapore</td>
      <td>28</td>
      <td>2010/11/14</td>
      <td>$357,650</td>
    </tr>
    <tr>
      <td>Brenden Wagner</td>
      <td>Software Engineer</td>
      <td>San Francisco</td>
      <td>28</td>
      <td>2011/06/07</td>
      <td>$206,850</td>
    </tr>
    <tr>
      <td>Fiona Green</td>
      <td>Chief Operating Officer (COO)</td>
      <td>San Francisco</td>
      <td>48</td>
      <td>2010/03/11</td>
      <td>$850,000</td>
    </tr>
    <tr>
      <td>Shou Itou</td>
      <td>Regional Marketing</td>
      <td>Tokyo</td>
      <td>20</td>
      <td>2011/08/14</td>
      <td>$163,000</td>
    </tr>
    <tr>
      <td>Michelle House</td>
      <td>Integration Specialist</td>
      <td>Sidney</td>
      <td>37</td>
      <td>2011/06/02</td>
      <td>$95,400</td>
    </tr>
    <tr>
      <td>Suki Burks</td>
      <td>Developer</td>
      <td>London</td>
      <td>53</td>
      <td>2009/10/22</td>
      <td>$114,500</td>
    </tr>
    <tr>
      <td>Prescott Bartlett</td>
      <td>Technical Author</td>
      <td>London</td>
      <td>27</td>
      <td>2011/05/07</td>
      <td>$145,000</td>
    </tr>
    <tr>
      <td>Gavin Cortez</td>
      <td>Team Leader</td>
      <td>San Francisco</td>
      <td>22</td>
      <td>2008/10/26</td>
      <td>$235,500</td>
    </tr>
    <tr>
      <td>Martena Mccray</td>
      <td>Post-Sales support</td>
      <td>Edinburgh</td>
      <td>46</td>
      <td>2011/03/09</td>
      <td>$324,050</td>
    </tr>
    <tr>
      <td>Unity Butler</td>
      <td>Marketing Designer</td>
      <td>San Francisco</td>
      <td>47</td>
      <td>2009/12/09</td>
      <td>$85,675</td>
    </tr>
    <tr>
      <td>Howard Hatfield</td>
      <td>Office Manager</td>
      <td>San Francisco</td>
      <td>51</td>
      <td>2008/12/16</td>
      <td>$164,500</td>
    </tr>
    <tr>
      <td>Hope Fuentes</td>
      <td>Secretary</td>
      <td>San Francisco</td>
      <td>41</td>
      <td>2010/02/12</td>
      <td>$109,850</td>
    </tr>
    <tr>
      <td>Vivian Harrell</td>
      <td>Financial Controller</td>
      <td>San Francisco</td>
      <td>62</td>
      <td>2009/02/14</td>
      <td>$452,500</td>
    </tr>
    <tr>
      <td>Timothy Mooney</td>
      <td>Office Manager</td>
      <td>London</td>
      <td>37</td>
      <td>2008/12/11</td>
      <td>$136,200</td>
    </tr>
    <tr>
      <td>Jackson Bradshaw</td>
      <td>Director</td>
      <td>New York</td>
      <td>65</td>
      <td>2008/09/26</td>
      <td>$645,750</td>
    </tr>
    <tr>
      <td>Olivia Liang</td>
      <td>Support Engineer</td>
      <td>Singapore</td>
      <td>64</td>
      <td>2011/02/03</td>
      <td>$234,500</td>
    </tr>
    <tr>
      <td>Bruno Nash</td>
      <td>Software Engineer</td>
      <td>London</td>
      <td>38</td>
      <td>2011/05/03</td>
      <td>$163,500</td>
    </tr>
    <tr>
      <td>Sakura Yamamoto</td>
      <td>Support Engineer</td>
      <td>Tokyo</td>
      <td>37</td>
      <td>2009/08/19</td>
      <td>$139,575</td>
    </tr>
    <tr>
      <td>Thor Walton</td>
      <td>Developer</td>
      <td>New York</td>
      <td>61</td>
      <td>2013/08/11</td>
      <td>$98,540</td>
    </tr>
    <tr>
      <td>Finn Camacho</td>
      <td>Support Engineer</td>
      <td>San Francisco</td>
      <td>47</td>
      <td>2009/07/07</td>
      <td>$87,500</td>
    </tr>
    <tr>
      <td>Serge Baldwin</td>
      <td>Data Coordinator</td>
      <td>Singapore</td>
      <td>64</td>
      <td>2012/04/09</td>
      <td>$138,575</td>
    </tr>
    <tr>
      <td>Zenaida Frank</td>
      <td>Software Engineer</td>
      <td>New York</td>
      <td>63</td>
      <td>2010/01/04</td>
      <td>$125,250</td>
    </tr>
    <tr>
      <td>Zorita Serrano</td>
      <td>Software Engineer</td>
      <td>San Francisco</td>
      <td>56</td>
      <td>2012/06/01</td>
      <td>$115,000</td>
    </tr>
    <tr>
      <td>Jennifer Acosta</td>
      <td>Junior Javascript Developer</td>
      <td>Edinburgh</td>
      <td>43</td>
      <td>2013/02/01</td>
      <td>$75,650</td>
    </tr>
    <tr>
      <td>Cara Stevens</td>
      <td>Sales Assistant</td>
      <td>New York</td>
      <td>46</td>
      <td>2011/12/06</td>
      <td>$145,600</td>
    </tr>
    <tr>
      <td>Hermione Butler</td>
      <td>Regional Director</td>
      <td>London</td>
      <td>47</td>
      <td>2011/03/21</td>
      <td>$356,250</td>
    </tr>
    <tr>
      <td>Lael Greer</td>
      <td>Systems Administrator</td>
      <td>London</td>
      <td>21</td>
      <td>2009/02/27</td>
      <td>$103,500</td>
    </tr>
    <tr>
      <td>Jonas Alexander</td>
      <td>Developer</td>
      <td>San Francisco</td>
      <td>30</td>
      <td>2010/07/14</td>
      <td>$86,500</td>
    </tr>
    <tr>
      <td>Shad Decker</td>
      <td>Regional Director</td>
      <td>Edinburgh</td>
      <td>51</td>
      <td>2008/11/13</td>
      <td>$183,000</td>
    </tr>
    <tr>
      <td>Michael Bruce</td>
      <td>Javascript Developer</td>
      <td>Singapore</td>
      <td>29</td>
      <td>2011/06/27</td>
      <td>$183,000</td>
    </tr>
    <tr>
      <td>Donna Snider</td>
      <td>Customer Support</td>
      <td>New York</td>
      <td>27</td>
      <td>2011/01/25</td>
      <td>$112,000</td>
    </tr>
  </tbody>
  <tfoot>
    <tr>
      <th>Name
      </th>
      <th>Position
      </th>
      <th>Office
      </th>
      <th>Age
      </th>
      <th>Start date
      </th>
      <th>Salary
      </th>
    </tr>
  </tfoot>
</table>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

<!-- Popper -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

<!-- Oven js plugins -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script>
	$(document).ready(function () {
  $('#dtBasicExample').DataTable();
  $('.dataTables_length').addClass('bs-select');
});
</script>
</body>
</html>