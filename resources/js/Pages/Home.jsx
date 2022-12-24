import { Link, Head } from '@inertiajs/inertia-react';

function Forecast(props) {
    return (
        <>
            <div className="flex flex-col items-center">
                <span className="text-sm font-bold">{ Math.round(props.temperature) }°</span>
                <img src={ `http://openweathermap.org/img/wn/${ props.icon }@2x.png` } alt="" />
                <span className="text-sm font-bold">{ new Date(props.date * 1000).toLocaleTimeString('en-US', { hour: '2-digit', minute:'2-digit', hour12: false }) }</span>
            </div>
        </>
    )
}

export default function Home(props) {
    const date = new Date();

    return (
        <>
            <Head title="Home" />
            <div className="w-full h-screen bg-violet-500 text-white overflow-auto">
                <div className="flex flex-col items-center gap-y-2 py-4">

                    <div className="flex gap-3">
                        <svg className="w-5 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 256c-35.3 0-64-28.7-64-64s28.7-64 64-64s64 28.7 64 64s-28.7 64-64 64z"/></svg>
                        <span className="text-xl">{ props.weather.city }</span>
                    </div>

                    <div className="flex">
                        <img src={ `http://openweathermap.org/img/wn/${ props.weather.weather.icon }@4x.png` } alt="" />
                    </div>

                    <div className="flex flex-col items-center">
                        <span className="text-7xl font-semibold">{ Math.round(props.weather.temperature.average) }°</span>
                        <span className="text-2xl">{ props.weather.weather.name }</span>
                        <span className="text-lg">{ `${date.toLocaleDateString('en-US', { weekday: 'long' })}, ${date.getDate()} ${date.toLocaleDateString('en-US', { month: 'long' })}` }</span>
                    </div>

                    <div className="w-full xxs:w-80 px-4 xxs:px-0 mt-8">
                        <div className="grid grid-cols-3 w-full py-6 bg-white rounded-lg text-black shadow-xl">
                            <div className="flex flex-col items-center">
                                <svg className="w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path d="M192 512C86 512 0 426 0 320C0 228.8 130.2 57.7 166.6 11.7C172.6 4.2 181.5 0 191.1 0h1.8c9.6 0 18.5 4.2 24.5 11.7C253.8 57.7 384 228.8 384 320c0 106-86 192-192 192zM96 336c0-8.8-7.2-16-16-16s-16 7.2-16 16c0 61.9 50.1 112 112 112c8.8 0 16-7.2 16-16s-7.2-16-16-16c-44.2 0-80-35.8-80-80z"/></svg>
                                <span className="mt-4 text-sm">Humidity</span>
                                <span className="text-base font-bold">{ props.weather.temperature.humidity }%</span>
                            </div>
                            <div className="flex flex-col items-center">
                                <svg className="w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M512 256c0 141.4-114.6 256-256 256S0 397.4 0 256S114.6 0 256 0S512 114.6 512 256zM320 352c0-26.9-16.5-49.9-40-59.3V88c0-13.3-10.7-24-24-24s-24 10.7-24 24V292.7c-23.5 9.5-40 32.5-40 59.3c0 35.3 28.7 64 64 64s64-28.7 64-64zM144 176c17.7 0 32-14.3 32-32s-14.3-32-32-32s-32 14.3-32 32s14.3 32 32 32zm-16 80c0-17.7-14.3-32-32-32s-32 14.3-32 32s14.3 32 32 32s32-14.3 32-32zm288 32c17.7 0 32-14.3 32-32s-14.3-32-32-32s-32 14.3-32 32s14.3 32 32 32zM400 144c0-17.7-14.3-32-32-32s-32 14.3-32 32s14.3 32 32 32s32-14.3 32-32z"/></svg>
                                <span className="mt-4 text-sm">Pressure</span>
                                <span className="text-base font-bold">{ props.weather.temperature.pressure } hPa</span>
                            </div>
                            <div className="flex flex-col items-center">
                                <svg className="w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M288 32c0 17.7 14.3 32 32 32h32c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32 14.3-32 32s14.3 32 32 32H352c53 0 96-43 96-96s-43-96-96-96H320c-17.7 0-32 14.3-32 32zm64 352c0 17.7 14.3 32 32 32h32c53 0 96-43 96-96s-43-96-96-96H32c-17.7 0-32 14.3-32 32s14.3 32 32 32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H384c-17.7 0-32 14.3-32 32zM128 512h32c53 0 96-43 96-96s-43-96-96-96H32c-17.7 0-32 14.3-32 32s14.3 32 32 32H160c17.7 0 32 14.3 32 32s-14.3 32-32 32H128c-17.7 0-32 14.3-32 32s14.3 32 32 32z"/></svg>
                                <span className="mt-4 text-sm">Wind</span>
                                <span className="text-base font-bold">{ props.weather.wind.speed } km/h</span>
                            </div>
                        </div>
                    </div>

                    <div className="w-full xxs:w-80 px-4 xxs:px-0 mt-4">
                        <div className="grid grid-cols-5 w-full py-6 px-4 gap-x-2 bg-white rounded-lg text-black shadow-xl">
                            { props.forecast.slice(0, 5).map((item) => {
                                console.log(item);
                                return <Forecast key={ item.date } temperature={ item.temperature.average } icon={ item.weather.icon } date={ item.date }/>
                            })}
                        </div>
                    </div>

                </div>
            </div>
        </>
    );
}
