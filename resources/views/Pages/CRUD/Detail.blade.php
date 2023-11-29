<x-MasterPage title="Home-Page">
    <style>
        .cardParent {
            width: 100%;
            display: flex;
            height: fit-content;
            flex-direction: row;
            align-items: center;
            justify-content: space-evenly;
        }

        .bodyContent {
            gap: 51px;
            display: flex;
            flex-direction: column;

            background-color: whitesmoke;
            border-radius: 7px;
            width: 400px;
            padding-inline: 10px;
            padding-block: 8px;
        }

        .image {
            border-radius: 8px;
        }

        .images {
            display: flex;
            gap: 5px;
        }

        img.image.dd {

            width: 30%;
            height: fit-content;
        }
    </style>
    <div class="container">

        <h1>Details Article :</h1>
        {{-- display: flex;flex-direction: row;flex-wrap: wrap;justify-content: space-around;gap:15px --}}
        <div class="">
            <div class="cardParent">
                <img class="image" width="400px" height="435px" src={{ asset('storage/' . $Art->image1) }} alt="Title">
                <div class="bodyContent">

                    <p class="" style="text-align: start"><b>Decription :</b> {{ $Art->description }}</p>
                    <div class="row " style="display: flex;flex-direction: row;">
                        <b style="width: fit-content">Prix :</b><span class="text-danger fw-bold"
                            style="width: fit-content"> {{ $Art->prix }}dh</span>
                    </div>
                    <b>Les autre image :</b>
                    <div class="images">
                        <img class="image dd" src={{ asset('storage/' . $Art->image2) }} alt="Title">
                        @if ($Art->image3)
                            <img class="image dd" width="60px" height="90px"
                                src={{ asset('storage/' . $Art->image3) }} alt="Title">
                        @endif
                        @if ($Art->image4)
                            <img class="image dd" width="60px" height="90px"
                                src={{ asset('storage/' . $Art->image4) }} alt="Title">
                        @endif


                    </div>
                </div>
            </div>
        </div>



    </div>
</x-MasterPage>
