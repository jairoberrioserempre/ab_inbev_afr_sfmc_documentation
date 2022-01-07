<h1>Africa Salesforce Marketing Cloud Email Connector - Documentation</h1>

<br><b>Important:</b> You must have the <em>Africa Salesforce Marketing Cloud Email Connector</em> module previously installed.

<br><b>1-</b> Download or clone the repository in your site, then install, in your site administration go to <em>/admin/modules</em> (Menu: <em>Extend</em>), filter by <em>Africa Salesforce Marketing Cloud Email Connector - Sample Custom Form</em> and click on <em>Install</em>.

<b>2-</b> Go to <em>/admin/config/ab-inbev/sfmc/data/create</em> (Menu: <em>Configuration - AB InBev - SFMC</em>, then click <em>Create SFMC</em>).

<b>3-</b> In the <em>Form type</em> field, choose the <em>Custom form</em> option.

<b>4-</b> The Custom form ID field will be displayed, this information can be found in the repository that you obtained in step 1, go to <em>.../ab_inbev_sfr_sfmc_documentation/src/Form/DocumentationForm.php</em>, in the <em>getFormId</em> function (line 22) copy the id of the form (line 23) and paste it in this field.

<b>5-</b> The Endpoint field will be displayed, choose the one you want to associate with the custom form.

<b>6-</b> The fields that must be sent to the endpoint will be displayed, this information can be found in the repository that you obtained in step 1, go to <em>.../ab_inbev_sfr_sfmc_documentation/src/Form/DocumentationForm.php</em>, in the <em>buildForm</em> function (line 37) you can find the fields that the custom form has and that you can use in the pairing with the endpoint (lines: 46, 53, 60, 67, 74, 81, 94, 101). The structure of the endpoint is:
<br>{<br>
          &nbsp;&nbsp;&nbsp;"To":{<br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"Address":"socialcommandcentrelatam@gmail.com", <b>=> Address = Email field</b>
            <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"SubscriberKey":"socialcommandcentrelatam@gmail.com", <b>=> SubscriberKey = Email field</b>
              <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"ContactAttributes":{
                <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"SubscriberAttributes":{
                  <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"EmailAddress": "socialcommandcentrelatam@gmail.com", <b>=> EmailAddress = Any field</b>
                  <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"abi_firstname": "Joaquín" <b>=> abi_firstname = Any field</b>
                  <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>.</b>
                  <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>.</b>
                  <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>.</b>
                  <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"abi_field_n": "Data field n" <b>=> abi_field_n = Any field</b>
                <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}
              <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}
            <br>&nbsp;&nbsp;&nbsp;}
        <br>}

You must send the email in the <em>Address</em> and <em>SubscriberKey</em> fields, in the others you can send any field.

<b>7-</b> Click <em>Create</em>.

<b>8-</b> Go to <em>/admin/config/ab-inbev/sfmc/sample-custom-form</em> (Menu: <em>Configuration - AB InBev - Sample Custom Form</em>), enter the data and then click <em>Register</em>.

<b>9-</b> If you have active the endpoint log record, go to <em>/admin/reports/dblog</em> (Menu: <em>Reports - Recent log messages</em>), filter by <em>ab_inbev_afr_sfmc_message_definition_sends</em>, click <em>Filter</em> and you will see the information that was sent to the enpoint with the data entered in the form (which you paired in the SMFC).

<b>Note 1:</b> You can verify if the log is active in <em>/admin/config/ab-inbev/sfmc/endpoints</em> (Menu: <em>Configuration - AB InBev - Endpoints</em>), there you will see the list of existing endpoints with the information of each one, in the <em>Actions</em> column you can click <em>Edit</em> and change the information of the endpoint you want.

<b>Note 2:</b> if you want to modify an SFMC, go to <em>/admin/config/ab-inbev/sfmc/data</em> (Menu: <em>Configuration - AB InBev - SFMC</em>), there you will see the list of existing SFMC's with the information of each one, in the <em>Actions</em> column you can click <em>Edit</em> and change the information of the SFMC you want.