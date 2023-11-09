<h1>MEMBER EDIT</h1>

<form action="{{route('update_member', $member->id)}}  " method="POST">
    @csrf
    @method('PUT')
    Name<input type="text" name="m_name" value="{{ $member->member_name }}">
    PHONE NUMBER<input type="text" name="m_phone" value="{{ $member->member_phone }}">

    <!-- Add other fields as needed -->
    <button type="submit">Save Changes</button>
</form>