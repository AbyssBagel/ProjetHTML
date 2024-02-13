SpellJsonFile='spells.json';
SpellTableName='spells_eng';

function FetchSpells(jsonfilename,tablename) {
    console.log(jsonfilename);
    console.log(tablename);
    const formData = new FormData();
    formData.append('jsonfilename', jsonfilename);
    formData.append('tablename', tablename);
    fetch('json_import_db.php', {
      method: 'POST',
      body: formData
    })
      .then(response => response.text())
      .then(data => console.log(data))
      .catch(error => console.error('Error:', error));
  }





function FetchSpells2() {
    FetchSpells(SpellJsonFile,SpellTableName);
  }