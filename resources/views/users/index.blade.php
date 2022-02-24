@extends('layouts.app')

@section('content')
<div class="container">
    <br>
                <h1>Korisnici</h1>

                    @if($users->count()>0)
                    <table class="table">
                        <thead>
                            <th>R.N.</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Kursevi</th>
                            <th>Dodeli kurs</th>
                            <th>Dodeli pravo</th>
                            <th>Ukini pravo</th>
                           
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                        
                        <tr>
                            <form action="{{ route('grant.courses.access', $user->id) }}" method ='POST'>
                                @csrf
                                @method("PUT")
                                <td>{{ $loop->iteration }}.</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role }}</td>
                                <td>
                                    <div class="form-group">
                                        <select name="course_id[]" id="course_id" multiple>
                                            @foreach($courses as $course)
                                                <option value="{{ $course->id }}" 
                                                @if(isset($user))
                                                    @if ($user->hasCourse($course->id))
                                                        selected
                                                    @endif
                                                @endif    
                                                >{{ $course->id }}. {{ $course->naziv }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-success btn-sm" >Dodeli</a>
                                </td>
                            </form>
                            
                            @if(!$user->isadmin())
                            <td> 
                                <form action="{{ route('users-access', $user->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-info btn-sm" style="color:#FFFFFF">Otkljucaj korisnika</a>
                                </form>
                            </td>
                            <td>
                            <form action="{{ route('users-deny-access', $user->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm" style="color:#FFFFFF">Ukini dozvolu</a>
                                </form>
                            </td>
                            @endif
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @else
                    <div class="text-center">
                        <h3 class="text-center">Nema registrovanih korisnika!</h3>
                    </div>
                    @endif

</div>
@endsection
