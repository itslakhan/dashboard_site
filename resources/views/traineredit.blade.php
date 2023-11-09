   <h1>trainer edit</h1>

        <form action=" {{route('update', $trainer->id)}} "  method="POST">
            @csrf
            @method('PUT')
            Name<input type="text" name="t_name" value="{{ $trainer->trainer_name }}">
            Batch<input type="text" name="t_batch" value="{{ $trainer->trainer_batch }}">

            <!-- Add other fields as needed -->
            <button type="submit">Save Changes</button>
        </form>


 