 <div class="u-container-style u-group u-white u-group-3">
  <div class="u-container-layout u-container-layout-14">
    <h2 class="u-custom-font u-font-ubuntu u-text u-text-default u-text-1">Vision & Mission</h2>
    <p class="u-custom-font u-font-pt-sans u-text u-text-2">Delhi School of Public Health (DSPH) will be an umbrella institution dedicated to studying and imparting training in the area of public health in varied dimensions – science, technology and policy in an integrated manner. DSPH will draw strength from the existing university faculties of Science, Medicine and Social Sciences to deliver and meet its stated objectives. DSPH is aimed to become the premier organization in the country and also globally to start teaching/ research/ outreach programmes that are aimed at carrying out cutting-edge research in the field of public health science, creation of bio-medial technologies and taking the products to the society, industry and the market with the help of social scientists working in tandem with science & technology experts.

    DSPH envisages integrated M.Sc.-Ph.D. Programmes in Public Health in areas such as Biomedical Sciences, Systems Biology, Environmental Pollution and Human Health, Functional Genomics, Community Health: Economics, Interventions & Engagement and Medical Technology. The motto of the School will be development of better strategies and technologies, and their social impacts to achieve “Health for All”. The overarching aim of the School is to encourage the students to undergo a choice based learning experience by offering them a plethora of subjects of interdisciplinary nature and relevance which are neither available at present in this or any other institution. This novel human resource development project will be jointly taken up by Departments of the University of Delhi.</p>
  </div>
</div>

<?php
    $schools = $school::find()->all();
    foreach ($schools as $index => $school) {
      //echo $index.'------------------ Delhi Schhol of '.$school->school_name.'-----------------'.$school->id.'<hr>';
    }
?>