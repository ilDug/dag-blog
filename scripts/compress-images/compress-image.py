from PIL import Image
import typer
from pathlib import Path
import shutil


def compress_png(filename, max_size, quality=70):
    with Image.open(filename) as img:
        # Convert to RGBA to avoid issues with transparency
        img = img.convert("RGBA")
        # Get the size of the original image
        width, height = img.size
        # Calculate the aspect ratio of the original image
        aspect_ratio = width / height
        # Calculate the new width and height based on the maximum size and aspect ratio
        if width > height:
            new_width = max_size
            new_height = int(new_width / aspect_ratio)
        else:
            new_height = max_size
            new_width = int(new_height * aspect_ratio)
        # Resize the image while keeping its aspect ratio
        img = img.resize((new_width, new_height))
        # Save the compressed image as PNG
        img.save(filename, optimize=True, quality=quality)


def backup_original(inputh_path: str):
    path = Path(inputh_path)
    original_filename = path.stem
    backup_path = path.with_stem(original_filename + ".bak")
    shutil.copy(inputh_path, backup_path)


def main(
    image: str = typer.Argument(..., help="il percorso all'immagine da comprimere"),
    size: int = typer.Option(
        768,
        "--size",
        "-s",
        help="la dimensione massima richiesta in px dell'immagine in output",
    ),
    quality: int = typer.Option(
        70,
        "--quality",
        "-q",
        help="l'indice di qualità del salvataggio dell'immagine (default 70)",
    ),
):
    backup_original(image)
    compress_png(image, size, quality)


if __name__ == "__main__":
    typer.run(main)
