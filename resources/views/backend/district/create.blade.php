<form action="{{'/students'}}" method="POST">

    @csrf
    <label for="district">District:</label>
    <input
        type="text"
        name="district"
        placeholder="Your District" ;>



    <button type="submit">
        Save
    </button>

</form>