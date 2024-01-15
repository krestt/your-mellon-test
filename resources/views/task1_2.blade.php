<x-tasks-layout>

            <div class="max-w-7xl mx-auto p-6 lg:p-8">
                <h2><u>Task 1.2</u></h2>
                <p>
					Write a program that allows a user to enter an integer and tells them if it is a <b>deficient</b>, <b>perfect</b> or
					<b>abundant</b> number.
                </p>

                <br>
                <br>

                <form method="POST" action="{{ route('task.one_two_submit') }}">
                	@csrf
                	Enter Any Number : 
                	<input type="number" name="number" style="border:1px solid black;">
                	<input type="submit" name="" style="cursor: pointer; border: 1px solid black; padding:0 10px;">
                </form>

                <div>
                    {{ isset($result)? $result : "Insert any number to see if it is a deficient, perfect or abundant number"}}
                    <br>
                    @if( isset($devisors) )
                        {{ "Devisors: " }}
                        @foreach($devisors as $devisor)
                            {{ !$loop->last ? $devisor.',' : $devisor }}
                        @endforeach
                    @endif                    
                    <br>
                    {{ isset($sum)? "Sum: ".$sum : ""}}
                </div>
            </div>

</x-tasks-layout>
