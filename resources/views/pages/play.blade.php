<?php
 
use App\Events\CharacterUpdated;
 
$updateCharacter = function(string $character) {
    CharacterUpdated::dispatch($character);
};
 
?>

<x-layouts.app title="Play">
    @volt
    <div id="playground" class="w-full h-screen flex items-center" style="background: rgb(74 222 128)">
        <div class="w-1/2">
            <img wire:click="updateCharacter('green')" class="cursor-pointer w-64 mx-auto" src="/earth_spirit.png"
                alt="radiant">
        </div>
        <div class="w-1/2">
            <img wire:click="updateCharacter('red')" class="cursor-pointer w-64 mx-auto" src="/mars.png" alt="png">
        </div>
    </div>
    @endvolt

    <script type="module">
        Echo.channel('character')
            .listen('CharacterUpdated', (e) => {
                if(e.character == 'green') {
                    document.getElementById('playground').style.background = 'rgb(74 222 128)';
                } else if (e.character == 'red') {
                    document.getElementById('playground').style.background = 'rgb(248, 113, 113)';
                }
            });
    </script>
</x-layouts.app>