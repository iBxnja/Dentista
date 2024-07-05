
@php
    $inicio = 19;
    $fin = 26;
@endphp

@foreach (range($inicio, $fin) as $i)
    @php
        // Formar los nombres de las claves según el índice $i
        $estadoKey = 'estado' . $i;
        $inputKey = 'input' . $i;
        $inputKey_1 = 'input' . $i . '_1';
        $inputKey_2 = 'input' . $i . '_2';
        $inputKey_3 = 'input' . $i . '_3';
        $inputKey_4 = 'input' . $i . '_4';

        // Obtener los valores correspondientes del array $datosJson
        $estadoValue = $datosJson[$estadoKey] ?? '';
        $inputValue = $datosJson[$inputKey] ?? '';
        $inputValue_1 = $datosJson[$inputKey_1] ?? '';
        $inputValue_2 = $datosJson[$inputKey_2] ?? '';
        $inputValue_3 = $datosJson[$inputKey_3] ?? '';
        $inputValue_4 = $datosJson[$inputKey_4] ?? '';

        // Establecer la clase predeterminada
        $defaultClass = 'bg-teal-500';

        // Verificar y asignar la clase correcta para cada input
        if (!empty($inputValue)) {
            $inputValue = strpos($inputValue, 'bg-') === 0 ? $inputValue : 'bg-' . $inputValue;
        } else {
            $inputValue = $defaultClass;
        }

        if (!empty($inputValue_1)) {
            $inputValue_1 = strpos($inputValue_1, 'bg-') === 0 ? $inputValue_1 : 'bg-' . $inputValue_1;
        } else {
            $inputValue_1 = $defaultClass;
        }

        if (!empty($inputValue_2)) {
            $inputValue_2 = strpos($inputValue_2, 'bg-') === 0 ? $inputValue_2 : 'bg-' . $inputValue_2;
        } else {
            $inputValue_2 = $defaultClass;
        }

        if (!empty($inputValue_3)) {
            $inputValue_3 = strpos($inputValue_3, 'bg-') === 0 ? $inputValue_3 : 'bg-' . $inputValue_3;
        } else {
            $inputValue_3 = $defaultClass;
        }

        if (!empty($inputValue_4)) {
            $inputValue_4 = strpos($inputValue_4, 'bg-') === 0 ? $inputValue_4 : 'bg-' . $inputValue_4;
        } else {
            $inputValue_4 = $defaultClass;
        }
    @endphp

    <div class="flex items-center justify-center flex-col mr-2 mb-2">
        <span>{{ $i }}</span>
        <input type="hidden" name="{{ $estadoKey }}" value="{{ $estadoValue }}"> <!-- Input oculto para guardar el estado -->
        <input type="text" class="text-transparent cursor-pointer w-3 h-3 {{ $inputValue }}" name="{{ $inputKey }}" onclick="cambiarEstado(this, {{ $i }})" />
        <div class="flex items-center justify-center">
            <input type="text" class="w-3 h-3 text-transparent cursor-pointer {{ $inputValue_1 }}" name="{{ $inputKey_1 }}" onclick="cambiarEstado(this, {{ $i }})" />
            <input type="text" class="m-1 w-3 h-3 text-transparent cursor-pointer {{ $inputValue_2 }}" name="{{ $inputKey_2 }}" onclick="cambiarEstado(this, {{ $i }})" />
            <input type="text" class="w-3 h-3 text-transparent cursor-pointer {{ $inputValue_3 }}" name="{{ $inputKey_3 }}" onclick="cambiarEstado(this, {{ $i }})" />
        </div>
        <input type="text" class="w-3 h-3 text-transparent cursor-pointer {{ $inputValue_4 }}" name="{{ $inputKey_4 }}" onclick="cambiarEstado(this, {{ $i }})" />
    </div>
@endforeach
