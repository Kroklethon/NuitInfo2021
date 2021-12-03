<section>
    <h1>Ajouter un sauveteur</h1>
    <form method='get' action='.'>

        <input  type='hidden'
                name='route'
                value='addSauveteur'/>

        <p>
            <label for='grade'>Grade</label>
            <input type="text" name="grade">
        </p>
        <p>
            <label for='nom'>Nom</label>
            <input type="text" name="nom">
        </p>
        <p>
            <label for='prenom'>Prenom</label>
            <input type="text" name="prenom">
        </p>
        <p>
            <label for='date_naissance'>Date de naissance</label>
            <input type="date" name="date_naissance">
        </p>
        <p>
            <input type="file" name="image" accept="image/png, image/jpeg">
        </p>
        <p>
            <input type="submit" value="Ajouter">
        </p>

        
    </form>
</section>