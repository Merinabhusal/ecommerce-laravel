<!-- resources/views/contact/form.blade.php -->
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<form action={{route('contact.store')}} method="POST" class="w-full max-w-lg bg-gray-200 p-8 rounded-lg shadow-lg">
    @csrf
    <div class="form-group">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
            Name
        </label>
        <input type="text" id="name" name="name" class="form-control" required>
    </div>

    <div class="mb-4 form-group">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
            Email
        </label>
        <input type="email" id="email" name="email" class="form-control" required>
    </div>

    <div class="mb-4 form-group ">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="message">
            Message
        </label>
        <textarea id="message" name="message" class="form-control" rows="5" required></textarea>
    </div>

    <button type="submit" class="btn btn-primary bg-pink-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Send Message</button>

</form>





