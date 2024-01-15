<x-tasks-layout>

            <div class="max-w-7xl mx-auto p-6 lg:p-8">
                <h2><u>Task 1.3</u></h2>
                <p>
					Write a program that allows a user to enter an integer and tells them if it is a <b>Harshad number</b> (base-10)
                </p>

                <br>
                <br>

                <form method="POST" action="{{ route('task.one_three_submit') }}">
                	@csrf
                	Enter Any Number : 
                	<input type="number" name="number" style="border:1px solid black;">
                	<input type="submit" name="" style="cursor: pointer; border: 1px solid black; padding:0 10px;">
                </form>

                <div>
                    {{ isset($result) ? $result : "Insert any number to see if it is a Harshad Number base-10"}}
                    <br>
                    @if( isset($digits) )
                        {{ "Digits: " }}
                        @foreach($digits as $digit)
                            {{ !$loop->last ? $digit.',' : $digit }}
                        @endforeach
                    @endif
                    <br>
                    {{ isset($sum) ? "Sum: ".$sum : ""}}
                    <br>
                    <br>
                    {{ isset($division) ? $division : "" }}
                </div>

</x-tasks-layout>