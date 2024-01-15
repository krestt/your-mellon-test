<x-tasks-layout>

            <div class="max-w-7xl mx-auto p-6 lg:p-8">
                <h2><u>Task 1.1</u></h2>
                <p>
                    The students quickly realize that the factor is always 900900.
                    The lazy teacher doesn’t want to calculate every single equation the students have come up with.
                    Therefore, he prefers a list of all possible products of two factors that add up to 900900, in ascending
                    order by the first factor, where the first factor should always be smaller than the second factor.
                    <br>
                    Write a program that outputs such a list so that the lazy teacher can quickly check the correct results.
                </p>

{{--                 @for($i=1; $i<900900; $i++)
                    @if( $i > (900900 / $i) )
                        @continue
                    @endif
                	<br> {{ (900900/$i)*$i }} = {{ $i }} * {{ 900900/$i }}
                @endfor --}}

                @foreach( $lines as $line )
                    {!! $line !!}
                @endforeach
            </div>

</x-tasks-layout>