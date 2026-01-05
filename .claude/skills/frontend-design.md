# Frontend Design Skill

## Beschreibung
Dieser Skill unterstützt bei der Erstellung und Gestaltung von Frontend-Komponenten mit Twig und Tailwind CSS.

## Verwendung
```
/frontend-design [Komponenten-Typ]
```

## Aufgaben

### 1. Komponentenanalyse
- Analysiere bestehende Twig-Templates im Projekt
- Identifiziere gemeinsame Designmuster
- Prüfe Tailwind CSS Konfiguration

### 2. Komponenten-Erstellung
- Erstelle semantisch korrekte HTML-Struktur
- Verwende Tailwind CSS Utility-Klassen
- Implementiere responsive Design (mobile-first)
- Berücksichtige Accessibility (ARIA-Labels, semantische Tags)

### 3. Twig Best Practices
- Nutze Template-Vererbung (`extends`, `block`)
- Verwende Includes für wiederverwendbare Komponenten
- Implementiere Macros für komplexe UI-Elemente
- Nutze Twig-Filter und -Funktionen sinnvoll

### 4. Tailwind CSS Guidelines
- Verwende vorhandene Utility-Klassen
- Nutze Custom-Klassen nur für wiederholte Muster
- Implementiere Dark Mode Support falls konfiguriert
- Optimiere für Performance (PurgeCSS)

### 5. Design-Prinzipien
- Konsistente Abstände und Spacing (Tailwind Spacing Scale)
- Einheitliche Farbpalette aus Tailwind-Konfiguration
- Responsive Breakpoints: sm, md, lg, xl, 2xl
- Hover- und Focus-States für Interaktivität

## Workflow

1. **Anforderungen verstehen**
   - Welche Komponente soll erstellt werden?
   - Welche Funktionalität wird benötigt?
   - Mobile oder Desktop-First?

2. **Struktur planen**
   - HTML-Semantik festlegen
   - Twig-Template-Struktur definieren
   - Wiederverwendbare Teile identifizieren

3. **Implementierung**
   - Twig-Template erstellen
   - Tailwind-Klassen anwenden
   - Responsive-Varianten hinzufügen

4. **Validierung**
   - HTML-Validität prüfen
   - Accessibility testen
   - Responsive Design auf verschiedenen Breakpoints testen

## Beispiel-Komponenten

### Button-Komponente (Twig Macro)
```twig
{# components/button.html.twig #}
{% macro primary(text, type = 'button', classes = '') %}
    <button
        type="{{ type }}"
        class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors {{ classes }}"
    >
        {{ text }}
    </button>
{% endmacro %}
```

### Card-Komponente
```twig
{# components/card.html.twig #}
<div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
    <div class="p-6">
        {% block card_header %}{% endblock %}
        {% block card_body %}{% endblock %}
        {% block card_footer %}{% endblock %}
    </div>
</div>
```

### Responsive Grid-Layout
```twig
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 p-4">
    {% for item in items %}
        <div class="bg-white rounded-lg shadow p-4">
            {{ item.content }}
        </div>
    {% endfor %}
</div>
```

## Checkliste

- [ ] HTML ist semantisch korrekt
- [ ] Tailwind-Klassen sind optimal gewählt
- [ ] Responsive Design funktioniert auf allen Breakpoints
- [ ] Accessibility-Standards sind eingehalten
- [ ] Twig-Template ist wiederverwendbar
- [ ] Code folgt PSR-12 (bei PHP-Integration)
- [ ] Keine redundanten Klassen oder Styles
- [ ] Hover/Focus-States sind implementiert

## Ressourcen

- [Tailwind CSS Dokumentation](https://tailwindcss.com/docs)
- [Twig Dokumentation](https://twig.symfony.com/doc/)
- [ARIA Best Practices](https://www.w3.org/WAI/ARIA/apg/)
